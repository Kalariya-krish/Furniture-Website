<?php

namespace App\Http\Controllers;

use App\Models\add_to_cart;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\registration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use App\Models\DeleteToken;
use App\Models\offer_discount;
use App\Models\opening_hours;
use App\Models\order;
use App\Models\our_story;
use App\Models\product;
use App\Models\review;
use App\Models\slider;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function fetch_index()
    {
        $slider = slider::select()->get();
        $our_story = our_story::select()->get();
        $opening_hours = opening_hours::select()->get();
        return view('before/index', compact('slider', 'our_story', 'opening_hours'));
    }
    public function fetch_review()
    {
        $review = review::select()->get();
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_review',compact('review','loged_user'));
    }

    public function login_user(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email field cannot be empy',
            'password.required' => 'Password field cannot be empy',
        ]);
        $count = registration::where('Email', $req->email)->where('Password', $req->password)->count();
        $count2 = admin::where('Email', $req->email)->where('Password', $req->password)->count();
        if ($count == 1) {
            $result = registration::where('Email', $req->email)->first();
            if ($result->Status == 'Inactive') {
                session()->flash('activation_error', 'Your account is not activated');
                return redirect('login');
            } else if ($result->status == 'Deleted') {
                session()->flash('deleted_error', 'Your account is Deleted kindly contact admin');
                return redirect('Reactivate_deleted_acount');
            } else {
                session()->put('email', $result->Email);
                session()->put('password', $result->Password);
                return redirect('user/index');
            }
        } else if ($count2 == 1) {
            $result2 = admin::where('Email', $req->email)->where('Password', $req->password)->first();
            session()->put('email2', $result2->Email);
            session()->put('password2', $result2->Password);
            return redirect('admin_index');
        } else {
            session()->flash('login_error', 'Invalid email or password');
            return redirect('login');
        }
    }

    public function logout()
    {
        if (session('email')) {
            session()->forget('email');
            session()->forget('password');
            return redirect('login');
        }
    }

    public function contact(Request $req)
    {
        $req->validate([
            'first_name' => 'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'last_name' => 'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'email' => 'required|email',
            'me=>required'
        ], [
            'first_name.required' => 'Firstname field cannot be empy',
            'first_name.min' => 'Firstname contain at least 2 character',
            'first_name.regex' => 'Enter valid name',

            'last_name.required' => 'Lastname field cannot be empy',
            'last_name.min' => 'Lastname contain at least 2 character',
            'last_name.regex' => 'Enter valid name',

            'email.required' => 'Email field cannot be empy',

            'me.required' => 'message can not be empty'
        ]);
    }

    public function send_email_view($email)
    {
        $registration = registration::where('Email', $email)->first();
        return view('before/send_email_view', compact('registration'));
    }

    public function registration(Request $req)
    {
        $req->validate([
            'first_name' => 'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'last_name' => 'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'email' => 'required|email',
            'password' => 'required|regex:/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$)/u',
            'profile_picture' => 'mimes:jpg,png'
        ], [
            'first_name.required' => 'Firstname field cannot be empy',
            'first_name.min' => 'Firstname contain at least 2 character',
            'first_name.regex' => 'Enter valid name',

            'last_name.required' => 'Lastname field cannot be empy',
            'last_name.min' => 'Lastname contain at least 2 character',
            'last_name.regex' => 'Enter valid name',

            'email.required' => 'Email field cannot be empy',

            'password.required' => 'Password field cannot be empy',
            'password.regex' => 'Password contain minimum eight characters,one uppercase letter, one lowercase letter, one number and one special character',

            'profile_picture.mimes' => 'Please select only JPG or PNG file',
        ]);

        if ($req->has('profile_picture')) {
            $file_name = uniqid() . $req->profile_picture->getClientOriginalName();
            $req->profile_picture->move('images/registration', $file_name);
        } else {
            $file_name = 'default.png';
        }

        $reg_ins = new registration();
        $reg_ins->First_name = $req->first_name;
        $reg_ins->Last_name = $req->last_name;
        $reg_ins->Email = $req->email;
        $reg_ins->Password = $req->password;
        $reg_ins->Profile_picture = $file_name;
        $reg_ins->Mobile_no = "";
        $reg_ins->Address = "";
        $reg_ins->City = "";
        $reg_ins->Pin_code = "";
        $reg_ins->Bank_name = "";
        $reg_ins->Account_no = "";
        $reg_ins->Ifsc_code = "";
        $reg_ins->Account_no = "";
        $reg_ins->Activation_token = Str::random(60);
        $reg_ins->Status = "Inactive";

        if ($reg_ins->save()) {
            session()->flash('success', 'Registration Successfully');
            $token = registration::where('Email', $req->email)->first();
            $data = ['email' => $req->email, 'name' => $req->first_name, 'token' => $token->Activation_token];
            // $result = $this->send_email_view($data['email']);
            Mail::send('before/send_email_view', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name'])
                    ->subject('Activate Account');
                $message->from('kkalariya174@rku.ac.in', 'Best Furniture');
            });
            return redirect('login');
        } else {
            session()->flash('error', "Registration Failed");
            return redirect('registration');
        }
    }


    public function activate_account(Request $req)
    {

        $token = $req->get('token'); // Retrieve the token from the query parameters

        // Find the user by the activation token and activate their account
        $user = registration::where('Activation_token', $token)->first();

        if ($user) {
            $user->Status = "Active"; // Set the account as activated
            $user->save();
            // $data = registration::where('Activation_token',$token)->update(array('Status'=>'Active'));
            session()->flash('active_success', 'Your account is Active successfully Please Login');
            return redirect('login');
            // Redirect to a success page or display a success message
        } else {
            // Handle token not found (e.g., show an error message)
        }
    }

    public function fetch_user_index()
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_index', compact('loged_user'));
    }
    public function fetch_user_about()
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_about', compact('loged_user'));
    }
    public function fetch_user_contact()
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_contact', compact('loged_user'));
    }
    public function fetch_user_review()
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_review', compact('loged_user'));
    }
    public function fetch_user_sofas()
    {
        $sofa = product::where('Product', 'Sofa')->get();
        $loged_user = registration::where('Email', session('email'))->first();
        $offer = offer_discount::select()->get();
        return view('user/user_sofas', compact('sofa', 'loged_user','offer'));
    }
    public function fetch_user_chairs()
    {
        $chair = product::where('Product', 'Chair')->get();
        $loged_user = registration::where('Email', session('email'))->first();
        $offer = offer_discount::select()->get();
        return view('user/user_chairs', compact('chair', 'loged_user','offer'));
    }
    public function fetch_user_tables()
    {
        $table = product::where('Product', 'Table')->get();
        $loged_user = registration::where('Email', session('email'))->first();
        $offer = offer_discount::select()->get();
        return view('user/user_tables', compact('table', 'loged_user','offer'));
    }
    public function fetch_user_outdoor_and_guarden()
    {
        $outdoor = product::where('Product', 'Outdoor')->get();
        $loged_user = registration::where('Email', session('email'))->first();
        $offer = offer_discount::select()->get();
        return view('user/user_outdoor_guarden', compact('outdoor', 'loged_user','offer'));
    }
    public function fetch_user_change_password()
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_change_password', compact('loged_user'));
    }
    public function fetch_edit_profile()
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_edit_profile', compact('loged_user'));
    }
    public function update_data(Request $req)
    {
        $req->validate([
            'first_name' => 'required|mi n:2|regex:/(^[a-zA-Z]*$)/u',
            'last_name' => 'required|min:2|regex:/(^[a-zA-Z]*$)/u',
            'mobile_no' => 'nullable|min:10|max:10',
            'address' => 'nullable|min:3',
            'city' => 'nullable|regex:/(^[a-zA-Z]*$)/u',
            'pin_code' => 'nullable|min:6|max:6',
            'email' => 'email',
            'bank_name' => 'nullable|regex:/(^[a-zA-Z]*$)/u',
            'account_no' => 'nullable|regex:/(^\d{6,20}$)/u',
            'ifsc_code' => 'nullable|regex:/(^[A-Z]{4}[0][A-Z0-9]{6}$)/u',
            'profile_picture' => 'nullable|mimes:jpg,png'
        ], [
            'first_name.required' => 'Firstname field cannot be empy',
            'first_name.min' => 'Firstname contain at least 2 character',
            'first_name.regex' => 'Enter valid name',

            'last_name.required' => 'Lastname field cannot be empy',
            'last_name.min' => 'Lastname contain at least 2 character',
            'last_name.regex' => 'Enter valid name',

            'address.min' => 'Address contain atleast 3 letter',

            'mobile_no.min' => 'Mobile no contain 10 digit only',
            'mobile_no.max' => 'Mobile no contain 10 digit only',

            'pin_code.min' => 'Pin code contain 6 digit only',
            'pin_code.max' => 'Pin code contain 6 digit only',

            'city.regex' => 'Enter valid city name',

            'bank_name.regex' => 'Enter valid bank name',

            'account_no.regex' => 'Account number contain 6/8/9/12/20 digit',

            'ifsc_code.regex' => 'Four uppercase alphabet characters (bank code),single zero character (reserved for future use), six uppercase alphabetical characters or digits (branch code)',

            'profile_picture.mimes' => 'Please select only JPG or PNG file',
        ]);

        $data = registration::where('Email', $req->email)->first();
        if ($req->hasFile('profile_picture')) {
            $file_path = "images/registration/" . $data['Profile_picture'];
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file_name = uniqid() . $req->profile_picture->getClientOriginalName();
            $req->profile_picture->move('images/registration', $file_name);
            $data = registration::where('Email', $req->email)->update(array(
                'First_name' => $req->first_name, 'Last_name' => $req->last_name, 'Mobile_no' => $req->mobile_no, 'Address' => $req->address,
                'City' => $req->city, 'Pin_code' => $req->pin_code, 'Bank_name' => $req->bank_name, 'Account_no' => $req->account_no, 'Ifsc_code' => $req->ifsc_code,
                'Profile_picture' => $file_name
            ));
        } else {
            $data = registration::where('Email', $req->email)->update(array(
                'First_name' => $req->first_name, 'Last_name' => $req->last_name, 'Mobile_no' => $req->mobile_no, 'Address' => $req->address,
                'City' => $req->city, 'Pin_code' => $req->pin_code, 'Bank_name' => $req->bank_name, 'Account_no' => $req->account_no, 'Ifsc_code' => $req->ifsc_code
            ));
        }

        return $this->fetch_edit_profile();
    }

    public function change_password(Request $req)
    {
        $req->validate([
            'current_password' => 'required',
            'new_password' => 'required|regex:/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$)/u|confirmed',
            'new_password_confirmation' => 'required'
        ], [
            'current_password.required' => 'Current password field cannot be empy',
            'new_password.required' => 'Password field cannot be empy',
            'new_password.regex' => 'Password contain minimum eight characters,one uppercase letter, one lowercase letter, one number and one special character',
            'new_password.confirmed' => 'Password and confirm password must be same',

            'new_password_confirmation.required' => 'Confirm password field cannot be empty',
        ]);

        $count = registration::where('Email', session('email'))->where('Password', $req->current_password)->count();
        if ($count == 0) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'The current password is incorrect. Please try again.']);
            // session()->flash('wrong_curr_pass',"Current Password is wrong");
            // return redirect('user/change_password');
        } else {
            if (registration::where('Email', session('email'))->update(array('Password' => $req->new_password))) {
                session()->flash('change_success', "Password change successfully");
                return redirect('user/change_password');
            } else {
                session()->flash('change_error', "Password change successfully");
                return redirect('user/change_password');
            }
        }
    }

    public function fetch_customize_order()
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_customize_order', compact('loged_user'));
    }
    public function fetch_customize_sofa()
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_customize_sofa', compact('loged_user'));
    }
    public function fetch_customize_chair(Request $req)
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_customize_chair', compact('loged_user'));
    }
    public function fetch_customize_table(Request $req)
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_customize_table', compact('loged_user'));
    }
    public function fetch_customize_bed_frame(Request $req)
    {
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_customize_bed_frame', compact('loged_user'));
    }

    public function customize_sofa(Request $req)
    {
        $req->validate([
            'sofa_cushion' => 'required',
            'sofa_demo_picture' => 'mimes:jpg,png'
        ], [
            'sofa_cushion.required' => 'Plese select sofa cushion',
            'sofa_demo_picture.mimes' => 'Please select JPG or PNG file'
        ]);


        DB::table('sofas')->insert([
            'cushion' => $req->input('sofa_cushion'),
            'demo_picture' => $req->file('sofa_demo_picture')->store('public/sofa_demo_pictures')
        ]);
    
        // Redirect to a success page
        return redirect()->route('customize_sofa_success');
    
    }

    public function customize_chair(Request $req)
    {
        $req->validate([
            'chair_demo_picture' => 'mimes:jpg,png'
        ], [
            'chair_demo_picture.mimes' => 'Please select JPG or PNG file'
        ]);
    }

    public function customize_table(Request $req)
    {
        $req->validate([
            'table_demo_picture' => 'mimes:jpg,png'
        ], [

            'table_demo_picture.mimes' => 'Please select JPG or PNG file'
        ]);
    }

    public function customize_bed_frame(Request $req)
    {
        $req->validate([
            'bed_storage' => 'required',
            'bed_demo_picture' => 'mimes:jpg,png'
        ], [
            'bed_storage.required' => 'Please select bed storage type',
            'bed_demo_picture.mimes' => 'Please select JPG or PNG file'
        ]);
    }

    public function fetch_data()
    {
        $data = registration::select()->get();
        return view('index', compact('data'));
    }

    public function forget_password_form_submit(Request $req)
    {
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $rules = ['em' => 'required|email'];
        $errors = [
            'em.required' => 'Email addrss is a required field',
            'em.email' => 'Enter a valid email address'
        ];
        $req->validate($rules, $errors);
        $em = $req->em;
        $data = registration::where('Email', $em)->first();
        if ($data) {
            $data1 = DeleteToken::where('email', $em)->first();
            if ($data1) {
                session()->flash('warning', 'A Password reset link is already sent to your mail please check. New link will be generated after old link expires');
            } else {
                date_default_timezone_set("Asia/Kolkata");
                $s_time = date("Y-m-d G:i:s");

                $token = hash('sha512', $s_time);
                $otp = mt_rand(100000, 999999);
                $data2 = array('name' => $data->First_name, 'email' => $em, 'token' => $token, 'otp' => $otp);
                try {
                    Mail::send(['text' => 'before/mail_forget_pwd'], ["data3" => $data2], function ($message) use ($data2) {
                        $message->to($data2['email'], $data2['name'])->subject('Account Activation Link');
                        $message->from('kkalariya174@rku.ac.in', 'Krish Kalariya');
                    });
                } catch (Exception $ex) {
                    session()->flash('error', 'We encountered some error in sending the password reset token');
                    return redirect('forget_password_form');
                }
                $expiry_time = Carbon::now()->addMinutes(30);
                $token_ins = new DeleteToken();
                $token_ins->email = $em;
                $token_ins->otp = $otp;
                $token_ins->token = $token;
                $token_ins->expiry_time = $expiry_time;
                if ($token_ins->save()) {
                    session()->flash('success', 'Password reset tokens sent to your registered email address');
                }
            }
        } else {
            session()->flash('error', 'Sorry the email address you entered is not registered.');
        }
        return redirect('forget_password_form');
    }

    public function verify_forget_pwd_otp($email, $token)
    {
        date_default_timezone_set("Asia/Kolkata");
        session()->put('forget_pwd_email', $email);
        session()->put('forget_pwd_token', $token);
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $data1 = DeleteToken::where('email', $email)->first();
        if ($data1) {
            return view('before/verify_otp_forget_pwd');
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function verify_otp_forget_password_action(Request $req)
    {

        $req->validate(['otp' => 'required|size:6'], ['otp.required' => 'OTP cannot be empty', 'otp.size' => 'OTP must have 6 digits only']);
        $otp = $req->otp;
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        $data = DeleteToken::where('email', $email)->where('token', $token)->first();
        if ($data) {
            if ($data->otp == $otp) {
                return view('before/reset_pwd');
            } else {
                session()->flash('error', 'Incorrect OTP');
                return view('before/verify_otp_forget_pwd');
            }
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function reset_pwd_action(Request $req)
    {
        $rules = [
            'npwd' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/|confirmed',
            'npwd_confirmation' => 'required',
        ];
        $errors = [
            'npwd.required' => 'Password field cannot be empty',
            'npwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'npwd.confirmed' => 'Password and Confirm Password must match',
            'npwd_confirmation.required' => 'Confirm Password must not be empty'
        ];
        $req->validate($rules, $errors);
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $data = DeleteToken::where('email', $email)->where('token', $token)->first();
        if ($data) {
            $data1 = registration::where('email', $email)->update(array('password' => $req->npwd));
            if ($data1) {
                DeleteToken::where('email', $email)->delete();
                session()->flash('succ', 'Password changed successfully');
                return redirect('login');
            }
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function user_view_product($id)
    {
        $data = product::where('Pro_id', $id)->first();
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_view_product', compact('data', 'loged_user'));
    }

    public function user_add_to_cart($id)
    {
        $data = product::where('Pro_id', $id)->first();
        // Return view('add_to_cart',compact('data'));
        $exists = add_to_cart::where('Pro_id', $id)->get();
        if ($exists->count() > 0) {
            session()->flash('product_exists', 'This product is already in your cart');
            return $this->user_view_product($id);
        } else {
            $pro_ins = new add_to_cart();
            $pro_ins->Email = session('email');
            $pro_ins->Pro_id = $data['Pro_id'];
            $pro_ins->Pro_img = $data['Pro_img'];
            $pro_ins->Pro_name = $data['Pro_name'];
            $pro_ins->Quantity = '1';
            // $pro_ins->Size = '6';
            if ($pro_ins->save()) {
                session()->flash('success', 'Product added to your cart');
                return $this->user_view_product($id);
            } else {
                session()->flash('error', 'Error in add product in your cart');
                return $this->user_view_product($id);
            }
        }
    }

    public function user_my_cart()
    {
        $data = DB::table('products')
            ->join('add_to_carts', 'products.Pro_id', '=', 'add_to_carts.Pro_id')
            ->get();
        $loged_user = registration::where('Email', session('email'))->first();
        return view('user/user_my_cart', compact('data', 'loged_user'));
    }

    public function decrement_quantity($id)
    {
        $data = add_to_cart::select()->first();
        $a = add_to_cart::where('Pro_id', $id)->update(array('Quantity' => $data->Quantity - 1));
        return $this->user_my_cart();
    }
    public function increment_quantity($id)
    {
        $data = add_to_cart::select()->first();
        $a = add_to_cart::where('Pro_id', $id)->update(array('Quantity' => $data->Quantity + 1));
        return $this->user_my_cart();
    }

    public function user_remove_from_cart($id)
    {
        $count = add_to_cart::select()->get();
        if ($count->count() > 0) {
            if (add_to_cart::where('Pro_id', $id)->delete()) {
                session()->flash('remove_success', 'Product is successfully removed from your cart');
                return $this->user_my_cart();
            } else {
                session()->flash('remove_error', 'Error in removing product from cart');
                return $this->user_my_cart();
            }
        }
    }

    public function apply_filter_sofa(Request $req)
    {
        $loged_user = registration::where('Email', session('email'))->first();
        $sofaQuery = product::query();
        $offer = offer_discount::select()->get();

        // Apply all filters

        // Filter based on price
        if ($req->has('price')) {
            $price = $req->price;
            // Adjust price ranges based on your requirements
            if ($price == 10000) {
                $sofaQuery->where('Pro_price', '<=', 10000)->where('Product','Sofa');
            } elseif ($price == 20000) {
                $sofaQuery->whereBetween('Pro_price', [10000, 20000])->where('Product','Sofa');
            } elseif ($price == 30000) {
                $sofaQuery->whereBetween('Pro_price', [30000, 40000])->where('Product','Sofa');
            } elseif ($price == 40000) {
                $sofaQuery->whereBetween('Pro_price', [40000, 50000])->where('Product','Sofa');
            }
        }

        if ($req->has('type')) {
            // Filter by type
            $type = $req->type;
            $sofaQuery->where('Pro_type', $type)->where('Product','Sofa');
        }

        // Filter based on color
        if ($req->has('color')) {
            $color = $req->color;
            $sofaQuery->where('Pro_color', $color)->where('Product','Sofa');
        }

        // Filter based on material
        if ($req->has('material')) {
            $material = $req->material;
            $sofaQuery->where('Pro_material', $material)->where('Product','Sofa');
        }

        // Filter based on width
        if ($req->has('width')) {
            $width = $req->width;
            // Adjust width ranges based on your requirements
            if ($width == 150) {
                $sofaQuery->whereBetween('Pro_width', [150, 200])->where('Product','Sofa');
            } elseif ($width == 200) {
                $sofaQuery->whereBetween('Pro_width', [200, 250])->where('Product','Sofa');
            } elseif ($width == 250) {
                $sofaQuery->whereBetween('Pro_width', [250, 300])->where('Product','Sofa');
            }
        }

        // Filter based on height
        if ($req->has('height')) {
            $height = $req->height;
            // Adjust height ranges based on your requirements
            if ($height == 50) {
                $sofaQuery->whereBetween('Pro_height', [50, 100])->where('Product','Sofa');
            }
        }

        // Filter based on depth
        if ($req->has('depth')) {
            $depth = $req->depth;
            // Adjust depth ranges based on your requirements
            if ($depth == 75) {
                $sofaQuery->whereBetween('Pro_depth', [75, 100])->where('Product','Sofa');
            } elseif ($depth == 100) {
                $sofaQuery->whereBetween('Pro_depth', [100, 150])->where('Product','Sofa');
            }
        }

        // Retrieve filtered products
        $sofa = $sofaQuery->get();

        if ($sofa->isEmpty() && $req->has('price')) {
            // If no products match the selected type, clear the type filter and retrieve products based on price only
            $sofaQuery = product::query();
            $price = $req->price;
            if ($price == 10000) {
                $sofaQuery->where('Pro_price', '<=', 10000)->where('Product','Sofa');
            } elseif ($price == 20000) {
                $sofaQuery->whereBetween('Pro_price', [10000, 20000])->where('Product','Sofa');
            } elseif ($price == 30000) {
                $sofaQuery->whereBetween('Pro_price', [30000, 40000])->where('Product','Sofa');
            } elseif ($price == 40000) {
                $sofaQuery->whereBetween('Pro_price', [40000, 50000])->where('Product','Sofa');
            }

            $sofa = $sofaQuery->get();
        }
        if ($sofa->isEmpty() && $req->has('type')) {
            $sofaQuery = product::query();
            if ($req->has('type')) {
                // Filter by type
                $type = $req->type;
                $sofaQuery->where('Pro_type', $type)->where('Product','Sofa');
            }
            $sofa = $sofaQuery->get();
        }
        if ($sofa->isEmpty() && $req->has('color')) {
            $sofaQuery = product::query();
            if ($req->has('color')) {
                $color = $req->color;
                $sofaQuery->where('Pro_color', $color)->where('Product','Sofa');
            }
            $sofa = $sofaQuery->get();
        }
        if ($sofa->isEmpty() && $req->has('material')) {
            $sofaQuery = product::query();
            if ($req->has('material')) {
                $material = $req->material;
                $sofaQuery->where('Pro_material', $material)->where('Product','Sofa');
            }
            $sofa = $sofaQuery->get();
        }
        if ($sofa->isEmpty() && $req->has('width')) {
            $sofaQuery = product::query();
            // Filter based on width
            if ($req->has('width')) {
                $width = $req->width;
                // Adjust width ranges based on your requirements
                if ($width == 150) {
                    $sofaQuery->whereBetween('Pro_width', [150, 200])->where('Product','Sofa');
                } elseif ($width == 200) {
                    $sofaQuery->whereBetween('Pro_width', [200, 250])->where('Product','Sofa');
                } elseif ($width == 250) {
                    $sofaQuery->whereBetween('Pro_width', [250, 300])->where('Product','Sofa');
                }
            }
            $sofa = $sofaQuery->get();
        }
        if ($sofa->isEmpty() && $req->has('height')) {
            $sofaQuery = product::query();
            // Filter based on height
            if ($req->has('height')) {
                $height = $req->height;
                // Adjust height ranges based on your requirements
                if ($height == 50) {
                    $sofaQuery->whereBetween('Pro_height', [50, 100])->where('Product','Sofa');
                }
            }
            $sofa = $sofaQuery->get();
        }
        if ($sofa->isEmpty() && $req->has('depth')) {
            $sofaQuery = product::query();
            if ($req->has('depth')) {
                $depth = $req->depth;
                // Adjust depth ranges based on your requirements
                if ($depth == 75) {
                    $sofaQuery->whereBetween('Pro_depth', [75, 100])->where('Product','Sofa');
                } elseif ($depth == 100) {
                    $sofaQuery->whereBetween('Pro_depth', [100, 150])->where('Product','Sofa');
                }
            }
            $sofa = $sofaQuery->get();
        }
        return view('user/user_sofas', compact('sofa', 'loged_user','offer'));
    }


    public function apply_filter_chair(Request $req)
    {
        $loged_user = registration::where('Email', session('email'))->first();
        $chairQuery = product::query();
        $offer = offer_discount::select()->get();

        if ($req->has('price')) {
            $price = $req->price;
            // Adjust price ranges based on your requirements
            if ($price == 10000) {
                $chairQuery->where('Pro_price', '<=', 10000)->where('Product','Chair');
            } elseif ($price == 20000) {
                $chairQuery->whereBetween('Pro_price', [10000, 20000])->where('Product','Chair');
            } elseif ($price == 30000) {
                $chairQuery->whereBetween('Pro_price', [30000, 40000])->where('Product','Chair');
            } elseif ($price == 40000) {
                $chairQuery->whereBetween('Pro_price', [40000, 50000])->where('Product','Chair');
            }
        }

        if ($req->has('type')) {
            // Filter by type
            $type = $req->type;
            $chairQuery->where('Pro_type', $type)->where('Product','Chair');
        }

        // Filter based on color
        if ($req->has('color')) {
            $color = $req->color;
            $chairQuery->where('Pro_color', $color)->where('Product','Chair');
        }

        // Filter based on material
        if ($req->has('material')) {
            $material = $req->material;
            $chairQuery->where('Pro_material', $material)->where('Product','Chair');
        }

        // Retrieve filtered products
        $chair = $chairQuery->get();

        if ($chair->isEmpty() && $req->has('price')) {
            // If no products match the selected type, clear the type filter and retrieve products based on price only
            $chairQuery = product::query();
            $price = $req->price;
            if ($price == 10000) {
                $chairQuery->where('Pro_price', '<=', 10000);
            } elseif ($price == 20000) {
                $chairQuery->whereBetween('Pro_price', [10000, 20000])->where('Product','Chair');
            } elseif ($price == 30000) {
                $chairQuery->whereBetween('Pro_price', [30000, 40000])->where('Product','Chair');
            } elseif ($price == 40000) {
                $chairQuery->whereBetween('Pro_price', [40000, 50000])->where('Product','Chair');
            }

            $chair = $chairQuery->get();
        }
        if ($chair->isEmpty() && $req->has('type')) {
            $chairQuery = product::query();
            if ($req->has('type')) {
                // Filter by type
                $type = $req->type;
                $chairQuery->where('Pro_type', $type)->where('Product','Chair');
            }
            $chair = $chairQuery->get();
        }
        if ($chair->isEmpty() && $req->has('color')) {
            $chairQuery = product::query();
            if ($req->has('color')) {
                $color = $req->color;
                $chairQuery->where('Pro_color', $color)->where('Product','Chair');
            }
            $chair = $chairQuery->get();
        }
        if ($chair->isEmpty() && $req->has('material')) {
            $chairQuery = product::query();
            if ($req->has('material')) {
                $material = $req->material;
                $chairQuery->where('Pro_material', $material)->where('Product','Chair');
            }
            $chair = $chairQuery->get();
        }
        return view('user/user_chairs', compact('chair', 'loged_user','offer'));
    }

    public function apply_filter_table(Request $req)
    {
        $loged_user = registration::where('Email', session('email'))->first();
        $tableQuery = product::query();
        $offer = offer_discount::select()->get();
        // Apply all filters

        // Filter based on price
        if ($req->has('price')) {
            $price = $req->price;
            // Adjust price ranges based on your requirements
            if ($price == 10000) {
                $tableQuery->where('Pro_price', '<=', 10000)->where('Product','Table');
            } elseif ($price == 20000) {
                $tableQuery->whereBetween('Pro_price', [10000, 20000])->where('Product','Table');
            } elseif ($price == 30000) {
                $tableQuery->whereBetween('Pro_price', [30000, 40000])->where('Product','Table');
            } elseif ($price == 40000) {
                $tableQuery->whereBetween('Pro_price', [40000, 50000])->where('Product','Table');
            }
        }

        if ($req->has('type')) {
            // Filter by type
            $type = $req->type;
            $tableQuery->where('Pro_type', $type)->where('Product','Table');
        }

        // Filter based on color
        if ($req->has('color')) {
            $color = $req->color;
            $tableQuery->where('Pro_color', $color)->where('Product','Table');
        }

        // Filter based on material
        if ($req->has('material')) {
            $material = $req->material;
            $tableQuery->where('Pro_material', $material)->where('Product','Table');
        }

        // Filter based on width
        if ($req->has('width')) {
            $width = $req->width;
            // Adjust width ranges based on your requirements
            if ($width == 150) {
                $tableQuery->whereBetween('Pro_width', [150, 200])->where('Product','Table');
            } elseif ($width == 200) {
                $tableQuery->whereBetween('Pro_width', [200, 250])->where('Product','Table');
            } elseif ($width == 250) {
                $tableQuery->whereBetween('Pro_width', [250, 300])->where('Product','Table');
            }
        }

        // Filter based on height
        if ($req->has('height')) {
            $height = $req->height;
            // Adjust height ranges based on your requirements
            if ($height == 50) {
                $tableQuery->whereBetween('Pro_height', [50, 100])->where('Product','Table');
            }
        }

        // Filter based on depth
        if ($req->has('depth')) {
            $depth = $req->depth;
            // Adjust depth ranges based on your requirements
            if ($depth == 75) {
                $tableQuery->whereBetween('Pro_depth', [75, 100])->where('Product','Table');
            } elseif ($depth == 100) {
                $tableQuery->whereBetween('Pro_depth', [100, 150])->where('Product','Table');
            }
        }

        // Retrieve filtered products
        $table = $tableQuery->get();

        if ($table->isEmpty() && $req->has('price')) {
            // If no products match the selected type, clear the type filter and retrieve products based on price only
            $tableQuery = product::query();
            $price = $req->price;
            if ($price == 10000) {
                $tableQuery->where('Pro_price', '<=', 10000)->where('Product','Table');
            } elseif ($price == 20000) {
                $tableQuery->whereBetween('Pro_price', [10000, 20000])->where('Product','Table');
            } elseif ($price == 30000) {
                $tableQuery->whereBetween('Pro_price', [30000, 40000])->where('Product','Table');
            } elseif ($price == 40000) {
                $tableQuery->whereBetween('Pro_price', [40000, 50000])->where('Product','Table');
            }

            $table = $tableQuery->get();
        }
        if ($table->isEmpty() && $req->has('type')) {
            $tableQuery = product::query();
            if ($req->has('type')) {
                // Filter by type
                $type = $req->type;
                $tableQuery->where('Pro_type', $type)->where('Product','Table');
            }
            $table = $tableQuery->get();
        }
        if ($table->isEmpty() && $req->has('color')) {
            $tableQuery = product::query();
            if ($req->has('color')) {
                $color = $req->color;
                $tableQuery->where('Pro_color', $color)->where('Product','Table');
            }
            $table = $tableQuery->get();
        }
        if ($table->isEmpty() && $req->has('material')) {
            $tableQuery = product::query();
            if ($req->has('material')) {
                $material = $req->material;
                $tableQuery->where('Pro_material', $material)->where('Product','Table');
            }
            $table = $tableQuery->get();
        }
        if ($table->isEmpty() && $req->has('width')) {
            $tableQuery = product::query();
            // Filter based on width
            if ($req->has('width')) {
                $width = $req->width;
                // Adjust width ranges based on your requirements
                if ($width == 150) {
                    $tableQuery->whereBetween('Pro_width', [150, 200])->where('Product','Table');
                } elseif ($width == 200) {
                    $tableQuery->whereBetween('Pro_width', [200, 250])->where('Product','Table');
                } elseif ($width == 250) {
                    $tableQuery->whereBetween('Pro_width', [250, 300])->where('Product','Table');
                }
            }
            $table = $tableQuery->get();
        }
        if ($table->isEmpty() && $req->has('height')) {
            $tableQuery = product::query();
            // Filter based on height
            if ($req->has('height')) {
                $height = $req->height;
                // Adjust height ranges based on your requirements
                if ($height == 50) {
                    $tableQuery->whereBetween('Pro_height', [50, 100])->where('Product','Table');
                }
            }
            $table = $tableQuery->get();
        }
        if ($table->isEmpty() && $req->has('depth')) {
            $tableQuery = product::query();
            if ($req->has('depth')) {
                $depth = $req->depth;
                // Adjust depth ranges based on your requirements
                if ($depth == 75) {
                    $tableQuery->whereBetween('Pro_depth', [75, 100])->where('Product','Table');
                } elseif ($depth == 100) {
                    $tableQuery->whereBetween('Pro_depth', [100, 150])->where('Product','Table');
                }
            }
            $table = $tableQuery->get();
        }
        return view('user/user_tables', compact('table', 'loged_user','offer'));
    }

    public function apply_filter_outdoor(Request $req)
    {
        $loged_user = registration::where('Email', session('email'))->first();
        $outdoorQuery = product::query();
        $offer = offer_discount::select()->get();
        // Apply all filters

        // Filter based on price
        if ($req->has('price')) {
            $price = $req->price;
            // Adjust price ranges based on your requirements
            if ($price == 10000) {
                $outdoorQuery->where('Pro_price', '<=', 10000)->where('Product','Outdoor');
            } elseif ($price == 20000) {
                $outdoorQuery->whereBetween('Pro_price', [10000, 20000])->where('Product','Outdoor');
            } elseif ($price == 30000) {
                $outdoorQuery->whereBetween('Pro_price', [30000, 40000])->where('Product','Outdoor');
            } elseif ($price == 40000) {
                $outdoorQuery->whereBetween('Pro_price', [40000, 50000])->where('Product','Outdoor');
            }
        }

        if ($req->has('type')) {
            // Filter by type
            $type = $req->type;
            $outdoorQuery->where('Pro_type', $type)->where('Product','Outdoor');
        }

        // Filter based on color
        if ($req->has('color')) {
            $color = $req->color;
            $outdoorQuery->where('Pro_color', $color)->where('Product','Outdoor');
        }

        // Filter based on material
        if ($req->has('material')) {
            $material = $req->material;
            $outdoorQuery->where('Pro_material', $material)->where('Product','Outdoor');
        }

        // Filter based on width
        if ($req->has('width')) {
            $width = $req->width;
            // Adjust width ranges based on your requirements
            if ($width == 150) {
                $outdoorQuery->whereBetween('Pro_width', [150, 200])->where('Product','Outdoor');
            } elseif ($width == 200) {
                $outdoorQuery->whereBetween('Pro_width', [200, 250])->where('Product','Outdoor');
            } elseif ($width == 250) {
                $outdoorQuery->whereBetween('Pro_width', [250, 300])->where('Product','Outdoor');
            }
        }

        // Filter based on height
        if ($req->has('height')) {
            $height = $req->height;
            // Adjust height ranges based on your requirements
            if ($height == 50) {
                $outdoorQuery->whereBetween('Pro_height', [50, 100])->where('Product','Outdoor');
            }
        }

        // Filter based on depth
        if ($req->has('depth')) {
            $depth = $req->depth;
            // Adjust depth ranges based on your requirements
            if ($depth == 75) {
                $outdoorQuery->whereBetween('Pro_depth', [75, 100])->where('Product','Outdoor');
            } elseif ($depth == 100) {
                $outdoorQuery->whereBetween('Pro_depth', [100, 150])->where('Product','Outdoor');
            }
        }

        // Retrieve filtered products
        $outdoor = $outdoorQuery->get();

        if ($outdoor->isEmpty() && $req->has('price')) {
            // If no products match the selected type, clear the type filter and retrieve products based on price only
            $outdoorQuery = product::query();
            $price = $req->price;
            if ($price == 10000) {
                $outdoorQuery->where('Pro_price', '<=', 10000)->where('Product','Outdoor');
            } elseif ($price == 20000) {
                $outdoorQuery->whereBetween('Pro_price', [10000, 20000])->where('Product','Outdoor');
            } elseif ($price == 30000) {
                $outdoorQuery->whereBetween('Pro_price', [30000, 40000])->where('Product','Outdoor');
            } elseif ($price == 40000) {
                $outdoorQuery->whereBetween('Pro_price', [40000, 50000])->where('Product','Outdoor');
            }

            $outdoor = $outdoorQuery->get();
        }
        if ($outdoor->isEmpty() && $req->has('type')) {
            $outdoorQuery = product::query();
            if ($req->has('type')) {
                // Filter by type
                $type = $req->type;
                $outdoorQuery->where('Pro_type', $type)->where('Product','Outdoor');
            }
            $outdoor = $outdoorQuery->get();
        }
        if ($outdoor->isEmpty() && $req->has('color')) {
            $sofaQuery = product::query();
            if ($req->has('color')) {
                $color = $req->color;
                $outdoorQuery->where('Pro_color', $color)->where('Product','Outdoor');
            }
            $outdoor = $outdoorQuery->get();
        }
        if ($outdoor->isEmpty() && $req->has('material')) {
            $outdoorQuery = product::query();
            if ($req->has('material')) {
                $material = $req->material;
                $outdoorQuery->where('Pro_material', $material)->where('Product','Outdoor');
            }
            $outdoor = $outdoorQuery->get();
        }
        if ($outdoor->isEmpty() && $req->has('width')) {
            $outdoorQuery = product::query();
            // Filter based on width
            if ($req->has('width')) {
                $width = $req->width;
                // Adjust width ranges based on your requirements
                if ($width == 150) {
                    $outdoorQuery->whereBetween('Pro_width', [150, 200])->where('Product','Outdoor');
                } elseif ($width == 200) {
                    $outdoorQuery->whereBetween('Pro_width', [200, 250])->where('Product','Outdoor');
                } elseif ($width == 250) {
                    $outdoorQuery->whereBetween('Pro_width', [250, 300])->where('Product','Outdoor');
                }
            }
            $outdoor = $outdoorQuery->get();
        }
        if ($outdoor->isEmpty() && $req->has('height')) {
            $outdoorQuery = product::query();
            // Filter based on height
            if ($req->has('height')) {
                $height = $req->height;
                // Adjust height ranges based on your requirements
                if ($height == 50) {
                    $outdoorQuery->whereBetween('Pro_height', [50, 100])->where('Product','Outdoor');
                }
            }
            $outdoor = $outdoorQuery->get();
        }
        if ($outdoor->isEmpty() && $req->has('depth')) {
            $outdoorQuery = product::query();
            if ($req->has('depth')) {
                $depth = $req->depth;
                // Adjust depth ranges based on your requirements
                if ($depth == 75) {
                    $outdoorQuery->whereBetween('Pro_depth', [75, 100])->where('Product','Outdoor');
                } elseif ($depth == 100) {
                    $outdoorQuery->whereBetween('Pro_depth', [100, 150])->where('Product','Outdoor');
                }
            }
            $outdoor = $outdoorQuery->get();
        }
        return view('user/user_outdoor_guarden', compact('outdoor', 'loged_user','offer'));
    }

    public function user_buy_now($id)
    {
        $pro_detail = product::where('Pro_id',$id)->first();
        $offer = offer_discount::select()->get();
        $loged_user = registration::where('Email',session('email'))->first();
        $cart = add_to_cart::where('Pro_id',$id)->first();

        return view('user/user_buy_now',compact('pro_detail','loged_user','cart','offer'));
        // $p = products::where('Pro_id',$id)->get();
        // $a = add_to_cart::where('Pro_id',$id)->get();
        // $buynow = new orders();
        // $buynow->Pro_id = $p->Pro_id;
        // $buynow->Pro_img = $p->Pro_img;
        // $buynow->Payment_method = 'Cash on Delivery';
        // $buynow->Order_date = now()->format('Y-m-d');
        // $buynow->Delivery_date = now()->addDays(5)->format('Y-m-d');
        // $buynow->Email = session('email');
        // $buynow->Quantity = $a->Quantity;
        // $buynow->Size = $a->Size;

        // if($buynow->save()){
        //     $cart = add_to_cart::find($a->Pro_id);
        //     $cart->delete();
        //     session()->flash('order_success','We received Your Order, we will connect with you soon');
        //     return $this->user_my_cart();
        // }
    }

    public function user_place_order(Request $req,$id)
    {
        $p = product::where('Pro_id',$id)->first();
        $data = new order();
        $data->Pro_id = $p->Pro_id;
        $data->Pro_img = $p->Pro_img;
        $data->Payment_method = $req->payment;
        $data->Order_date = now();
        $data->Delivery_date = Carbon::now()->addDays(5);;
        $data->Order_status = "Not delivered";
        $data->Email = session('email');
        $data->Quantity = $req->quantity;
        $data->Return_reason = "NO";

        $data->save();
        return redirect('user/user_my_order');
    }

    public function user_my_order()
    {
        $data = DB::table('products')
        ->join('orders','products.Pro_id','=','orders.Pro_id')
        ->get();
        $offer = offer_discount::select()->get();
        $loged_user = registration::where('Email',session('email'))->first();
        return view('user/user_my_order',compact('data','loged_user','offer'));
    }

    public function user_share_review(){
        $loged_user = registration::where('Email',session('email'))->first();
        return view('user/user_share_review',compact('loged_user'));
    }

    public function add_review(Request $req){
        $req->validate([
            'email'=>'required|email',
                        'rate'=>'required|min:1|max:5',
            'comment'=>'required',
        ],[
            'email.required'=>'Email can not be empty',
            'rate.required' =>'Rate cannot be empty',
            'rate.min' =>'Rate cannot be less than 1',
            'rate.min' =>'Rate cannot be more than 5',
            'comment.required' =>'Hit some Comment brother..'
        ]);
        $res_ins = new review();
        $res_ins->Rating=$req->rate;
        $res_ins->Text_review=$req->comment;
        $res_ins->Email=$req->email;
        $res_ins->save();
    }
    // if( $res_ins->save()){
    //     // Return $this->fetch_review();
    // }
    // else{
    //     echo'Review Addition Failed';
    // }
    // Return $this->fetch_review();
    // }

}
