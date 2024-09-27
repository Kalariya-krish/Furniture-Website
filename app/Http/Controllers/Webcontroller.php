<?php

namespace App\Http\Controllers;

use App\Models\add_to_cart;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Node\Stmt\Return_;
use App\Models\review;
use App\Models\orders;
use App\Models\student;  
use App\Models\products;  
use App\Models\cart;
use App\Models\offer_discount;
use App\Models\order;
use App\Models\product;
use App\Models\registration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

class Webcontroller extends Controller
{
    public function register_data(Request $req)
    {
        $req->validate([
            'first'=>'required|min:2|max:30',
            'last'=>'required|min:2|max:30',
            'password'=>'required|min:8|max:10',
            'mail'=>'required|email',
            'mobile'=>'required',
            'add'=>'required',
            'city'=>'required',
            'pincode'=>'required|min:6|max:10',
            'bank'=>'required',
            'account'=>'required',
            'ifsc'=>'required',
            'profile'=>'required'
        ],[
            'first.required'=>'First name can not be empty',
            'first.min'=>'First name contain minimum 2 character',
            'first.max'=>'First name contain maximum 30 character',

            'last.required'=>'Last name can not be empty',
            'last.min'=>'Last name contain minimum 2 character',
            'last.max'=>'last name contain maximum 30 character',

            'mobile.required'=>'Mobile no can not be empty',
            'mobile.max'=>'Mobile number contain only 10 digit',
            'mail.required'=>'Email can not be empty',

            'password.required'=>'Password field can not be empty',
            'password.min'=>'password minimum lenght is 8',
            'password.max'=>'password maximum lenght is 10',
            'add.required' =>'Address cannot be empty',
            'city.required' =>'City cannot be empty',
            'pincode.required' =>'Pincode cannot be empty',
            'pincode.min' =>'Pincode cannot be less than 6 character',
            'pincode.max' =>'Pincode cannot be more than 6 character',
            'bank.required' =>'Bank name cannot be empty',
            'account.required' =>'Account no cannot be empty',
            'account.min' =>'Account no cannot be less than 8 character',
            'account.max' =>'Account no cannot be mare than 15 character',
            'ifsc.required' =>'ifsc no cannot be empty',
            'profile.required'=>'Please select the file'
        ]);
        $file_name = uniqid().$req->file('profile')->getClientOriginalName();
        $req->profile->move('images/registration',$file_name);
        $res_ins = new registration();
        $res_ins->First_name=$req->first;
        $res_ins->Last_name=$req->last;
        $res_ins->Mobile_no=$req->mobile;
        $res_ins->Address=$req->add;
        $res_ins->City=$req->city;
        $res_ins->Pin_code=$req->pincode;
        $res_ins->Bank_name=$req->bank;
        $res_ins->Account_no=$req->account;
        $res_ins->Ifsc_code=$req->ifsc;
        $res_ins->Email=$req->mail;
        $res_ins->Password=$req->password;
        $res_ins->Profile_Picture=$file_name;

    if( $res_ins->save()){
        // $d=dummy::where('Email',$email)->first();
        $data=['email'=>$req->mail,'name'=>$req->First_name];
        Mail::send('send_email_view',['data'=>$data],function ($message) use($data) {
            $message->to($data['email'],$data['name']);
            $message->from('ndhinoja188@rku.ac.in','Nevil Dhinoja');
        });
        return $this->fetch_data();
    }
    else{
        echo'Registration Failed';
    }
}

public function ord_data(Request $req)
{
    $req->validate([
        'size'=>'required',
        'proid'=>'required|min:2|max:30',
        'pay'=>'required',
        'email'=>'required|email',
        'orddt'=>'required',
        'deldt'=>'required',
        'qty'=>'required',
    ],[
        'ordid.required'=>'First name can not be empty',
        'ordid.min'=>'First name contain minimum 2 character',
        'ordid.max'=>'First name contain maximum 30 character',
        'proid.required'=>'Last name can not be empty',
        'prodid.min'=>'Last name contain minimum 2 character',
        'proid.max'=>'last name contain maximum 30 character',
        'email.required'=>'Email can not be empty',
        'qty.required' =>'quantity cannot be empty',
        'deldt.required' =>'delivery Date cannot be empty',
        'orddt.required' =>'Order Date cannot be empty',
        'profile.required'=>'Please select the file'
    ]);
    $res_ins = new order();
    $res_ins->Pro_id=$req->proid;
    $res_ins->Payment=$req->pay;
    $res_ins->Ord_data=$req->orddt;
    $res_ins->Del_data=$req->deldt;
    $res_ins->Email=$req->email;
    $res_ins->Quantity=$req->qty;
    $res_ins->Size=$req->size;

if( $res_ins->save()){
    Return $this->fetch_order();
}
else{
    echo'Order Addition Failed';
}
Return $this->fetch_order();
}
public function addpro(Request $req)
{
    $req->validate([
        'proid'=>'required|min:2|max:30',
        'proname'=>'required|min:2|max:30',
        'type'=>'required|min:8|max:10',
        'price'=>'required',
        'color'=>'required',
        'proimg'=>'required',
        'more'=>'required',
    ],[
        'proid.required'=>'Product Id can not be empty',
        'proid.min'=>'Product Id contain minimum 2 character',
        'proid.max'=>'Product Id contain maximum 30 character',

        'proname.required'=>'Product name can not be empty',
        'proname.min'=>'Product name contain minimum 2 character',
        'proname.max'=>'Product name contain maximum 30 character',

        'type.required'=>'Type cannot be empty',
        'mobile.max'=>'Mobile number contain only 10 digit',
        'email.required'=>'Email can not be empty',

        'password.required'=>'Password field can not be empty',
        'password.min'=>'password minimum lenght is 8',
        'password.max'=>'password maximum lenght is 10',
        'price.required' =>'Price cannot be empty',
        'color.required' =>'color cannot be empty',
        'pincode.required' =>'Pincode cannot be empty',
        'pincode.min' =>'Pincode cannot be less than 6 character',
        'pincode.max' =>'Pincode cannot be more than 6 character',
        'bank.required' =>'Bank name cannot be empty',
        'account.required' =>'Account no cannot be empty',
        'account.min' =>'Account no cannot be less than 8 character',
        'deldt.required' =>'delivery Date cannot be empty',
        'more.required' =>'Please select the file',
        'proimg.required'=>'Please select the file'
    ]);
}
public function fetch_data()
{
    $data=registration::select()->get();
    Return view('index',compact('data'));
}
public function edit_data($email)
{
    $r = registration::where('Email',$email)->first();
    Return view("Edit_data",compact('r'));
}
public function update_data(Request $req)
    {
        $req->validate([
            'first'=>'required|min:2|max:30',
            'last'=>'required|min:2|max:30',
            'password'=>'required|min:8|max:10',
            'mail'=>'required|email',
            'mobile'=>'required',
            'add'=>'required',
            'city'=>'required',
            'pincode'=>'required|min:6|max:10',
            'bank'=>'required',
            'account'=>'required',
            'ifsc'=>'required'
        ],[
            'first.required'=>'First name can not be empty',
            'first.min'=>'First name contain minimum 2 character',
            'first.max'=>'First name contain maximum 30 character',

            'last.required'=>'Last name can not be empty',
            'last.min'=>'Last name contain minimum 2 character',
            'last.max'=>'last name contain maximum 30 character',

            'mobile.required'=>'Mobile no can not be empty',
            'mobile.max'=>'Mobile number contain only 10 digit',
            'mail.required'=>'Email can not be empty',

            'password.required'=>'Password field can not be empty',
            'password.min'=>'password minimum lenght is 8',
            'password.max'=>'password maximum lenght is 10',
            'add.required' =>'Address cannot be empty',
            'city.required' =>'City cannot be empty',
            'pincode.required' =>'Pincode cannot be empty',
            'pincode.min' =>'Pincode cannot be less than 6 character',
            'pincode.max' =>'Pincode cannot be more than 6 character',
            'bank.required' =>'Bank name cannot be empty',
            'account.required' =>'Account no cannot be empty',
            'account.min' =>'Account no cannot be less than 8 character',
            'account.max' =>'Account no cannot be mare than 15 character',
            'ifsc.required' =>'ifsc no cannot be empty'

        ]);

        $data = registration::where('Email',$req->mail)->first();
        $h = explode(',',$req->hobby);
        if($req->hasFile('profile'))
        {
            $file_path = "images/registration".$data['Profile_picture'];
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            $file_name = uniqid().$req->profile->getClientOriginalName();
            $req->profile->move('images/registration',$file_name);
            $data = registration::where('Email',$req->mail)->update(array('First_name'=>$req->first,'Last_name'=>$req->last,'Mobile_no'=>$req->mobile,'Password'=>$req->password,'Address'=>$req->add,'City'=>$req->city,'Pin_code'=>$req->pincode,'Bank_name'=>$req->bank,'Account_no'=>$req->account,'Ifsc_code'=>$req->ifsc,'Profile_picture'=>$file_name));
        }
        else
        {
            $data = registration::where('Email',$req->mail)->update(array('First_name'=>$req->first,'Last_name'=>$req->last,'Mobile_no'=>$req->mobile,'Password'=>$req->password,'Address'=>$req->add,'City'=>$req->city,'Pin_code'=>$req->pincode,'Bank_name'=>$req->bank,'Account_no'=>$req->account,'Ifsc_code'=>$req->ifsc));
        }
        Return $this->fetch_data();
    }
public function active_user($email)
{
    // $data = dummy::where('Email',$email)->update(array('Status'=>'Active'));
    $d=registration::where('Email',$email)->first();
    $data=['email'=>$email,'name'=>$d->First_name];
    Mail::send('send_email_view',['data'=>$data],function ($message) use($data) {
        $message->to($data['email'],$data['name']);
        $message->from('ndhinoja188@rku.ac.in','Nevil Dhinoja');
    });
    Return $this->fetch_data();
}
public function account_activate($email)
{
    $data = registration::where('Email',$email)->update(array('Status'=>'Active'));
    Return $this->fetch_data();
}
public function deactive_user($email)
{
    $data = registration::where('Email',$email)->update(array('Status'=>'Deactive'));
    Return $this->fetch_data();
}
public function delete_data($email)
{
    $data = registration::where('Email',$email)->update(array('Status'=>'Deleted'));
    Return $this->fetch_data();
}
public function fetch_review()
{
    $review=review::select()->get();
    Return view('review',compact('review'));
}
public function del_review($email)
{
    $data = review::where('Email',$email)->update(array('Status'=>'Deleted'));
    Return $this->fetch_review();
}
public function active_review($email)
{
    $data = review::where('Email',$email)->update(array('Status'=>'Active'));
    Return $this->fetch_review();
}
public function fetch_order()
{
    $orders=order::select()->get();
    Return view('order',compact('orders'));
}
public function edit_order($email)
{
    $ord = order::where('Email',$email)->first();
    Return view("Edit_order",compact('ord'));
}
public function updateord(Request $req)
    {
        $req->validate([
            'pro_id'=>'required',
            'pay'=>'required',
            'mail'=>'required|email',
            'orddt'=>'required',
            'deldt'=>'required',
            'qty'=>'required',
            'size'=>'required',
            'ordsts'=>'required'
        ],[
            'size.required'=>'First name can not be empty',
            'size.min'=>'First name contain minimum 2 character',
            'size.max'=>'First name contain maximum 30 character',
    
            'pro_id.required'=>'Last name can not be empty',
            'pro_id.min'=>'Last name contain minimum 2 character',
            'pro_id.max'=>'last name contain maximum 30 character',
    
            'mobile.required'=>'Mobile no can not be empty',
            'mobile.max'=>'Mobile number contain only 10 digit',
            'mail.required'=>'Email can not be empty',
    
            'password.required'=>'Password field can not be empty',
            'password.min'=>'password minimum lenght is 8',
            'password.max'=>'password maximum lenght is 10',
            'add.required' =>'Address cannot be empty',
            'qty.required' =>'quantity cannot be empty',
            'pincode.required' =>'Pincode cannot be empty',
            'pincode.min' =>'Pincode cannot be less than 6 character',
            'pincode.max' =>'Pincode cannot be more than 6 character',
            'bank.required' =>'Bank name cannot be empty',
            'account.required' =>'Account no cannot be empty',
            'account.min' =>'Account no cannot be less than 8 character',
            'deldt.required' =>'delivery Date cannot be empty',
            'orddt.required' =>'Order Date cannot be empty',
            'profile.required'=>'Please select the file',
            'ordsts.required'=>'Status is Required'
        ]);
         order::where('Email',$req->mail)->update(array('Pro_id'=>$req->pro_id,'Payment'=>$req->pay,'Ord_data'=>$req->orddt,'Del_data'=>$req->deldt,'Ord_status'=>$req->ordsts,'Quantity'=>$req->qty,'Size'=>$req->size));
        Return $this->fetch_order();
    }
 public function order_activate($email)
{
    $data = order::where('Email',$email)->update(array('Ord_status'=>'Ordered'));
    Return $this->fetch_order();
}
 public function delete_ord($email)
{
    $r = order::where('Email',$email)->update(array('Ord_status'=>'Deleted'));
    Return $this->fetch_order();
}
public function product_data(Request $req)
{
    $req->validate([
        'proid'=>'required|min:2|max:30',
        'proname'=>'required|min:2|max:30',
        'type'=>'required',
        'price'=>'required',
        'color'=>'required',
        'proimg'=>'required',
        'more1'=>'required',
        'more2'=>'required',
        'more3'=>'required',
        'more4'=>'required'
    ],[
        'proid.required'=>'Product Id can not be empty',
        'proid.min'=>'Product Id contain minimum 2 character',
        'proid.max'=>'Product Id contain maximum 30 character',

        'proname.required'=>'Product name can not be empty',
        'proname.min'=>'Product name contain minimum 2 character',
        'proname.max'=>'Product name contain maximum 30 character',
        'type.required'=>'Type cannot be empty',
        'price.required' =>'Price cannot be empty',
        'color.required' =>'color cannot be empty',
        'more1.required' =>'Please select the file',
        'more2.required' =>'Please select the file',
        'more3.required' =>'Please select the file',
        'more4.required' =>'Please select the file',
        'proimg.required'=>'Please select the file'
    ]);
    $file_name = uniqid().$req->file('proimg')->getClientOriginalName();
    $more1 = uniqid().$req->file('more1')->getClientOriginalName();
    $more2 = uniqid().$req->file('more2')->getClientOriginalName();
    $more3 = uniqid().$req->file('more3')->getClientOriginalName();
    $more4 = uniqid().$req->file('more4')->getClientOriginalName();

    $req->proimg->move('images/product',$file_name);
    $req->more1->move('images/product',$more1);
    $req->more2->move('images/product',$more2);
    $req->more3->move('images/product',$more3);
    $req->more4->move('images/product',$more4);

    $res_ins = new product();
    $res_ins->Pro_id=$req->proid;
    $res_ins->Pro_name=$req->proname;
    $res_ins->Pro_type=$req->type;
    $res_ins->Pro_material=$req->material;
    $res_ins->Pro_color=$req->color;
    $res_ins->Pro_price=$req->price;
    $res_ins->Pro_img=$file_name;
    $res_ins->Other_img1=$more1;
    $res_ins->Other_img2=$more2;
    $res_ins->Other_img3=$more3;
    $res_ins->Other_img4=$more4;

if( $res_ins->save()){
    Return $this->fetch_product();
}
else{
    echo'Product Entry Failed';
}
Return $this->fetch_product();
}
public function fetch_product()
{
    $product=product::select()->get();
    Return view('product',compact('product'));
}
public function edit_product($proid)
{
    $pro = product::where('Pro_id',$proid)->first();
    Return view("Edit_pro",compact('pro'));
}
public function unavailable_pro($proid)
{
    $data = product::where('Pro_id',$proid)->update(array('Product_status'=>'Unavailable'));
    Return $this->fetch_product();
}
public function available_pro($proid)
{
    $data = product::where('Pro_id',$proid)->update(array('Product_status'=>'Available'));
    Return $this->fetch_product();
}
public function updatepro(Request $req)
    {
        $req->validate([
            'proid'=>'required',
            'proname'=>'required',
            'type'=>'required',
            'price'=>'required',
            'color'=>'required',
            // 'proimg'=>'required',
            // 'more1'=>'required',
            // 'more2'=>'required',
            // 'more3'=>'required',
            // 'more4'=>'required'
        ],[
            'proid.required'=>'Product Id can not be empty',
            'proid.min'=>'Product Id contain minimum 2 character',
            'proid.max'=>'Product Id contain maximum 30 character',
    
            'proname.required'=>'Product name can not be empty',
            'proname.min'=>'Product name contain minimum 2 character',
            'proname.max'=>'Product name contain maximum 30 character',
            'type.required'=>'Type cannot be empty',
            'price.required' =>'Price cannot be empty',
            'color.required' =>'color cannot be empty'
            // 'more1.required' =>'Please select the file',
            // 'more2.required' =>'Please select the file',
            // 'more3.required' =>'Please select the file',
            // 'more4.required' =>'Please select the file',
            // 'proimg.required'=>'Please select the file'
        ]);
        $data = product::where('Pro_id',$req->proid)->first();
        if($req->hasFile('profile'))
        {
            $file_path = "images/product".$data['Pro_img'];
            if(File::exists($file_path))
             {
                File::delete($file_path);
             }
             $file_name = uniqid().$req->proimg->getClientOriginalName();
             $file_1 = uniqid().$req->more1->getClientOriginalName();
             $file_2 = uniqid().$req->more2->getClientOriginalName();
             $file_3 = uniqid().$req->more3->getClientOriginalName();
             $file_4 = uniqid().$req->more4->getClientOriginalName();
             $req->proimg->move('images/product',$file_name);
             $req->more1->move('images/product',$file_name);
             $req->more2->move('images/product',$file_name);
             $req->more3->move('images/product',$file_name);
             $req->more4->move('images/product',$file_name);
             product::where('Pro_id',$req->proid)->update(array('Pro_name'=>$req->proname,'Pro_type'=>$req->type,'Pro_material'=>$req->material,'Pro_color'=>$req->color,'Pro_img'=>$file_name,'Other_img1'=>$file_1,'Other_img2'=>$file_2,'Other_img3'=>$file_3,'Other_img4'=>$file_4));
        }
        else{
            product::where('Pro_id',$req->proid)->update(array('Pro_name'=>$req->proname,'Pro_type'=>$req->type,'Pro_material'=>$req->material,'Pro_color'=>$req->color));
        } 
        Return $this->fetch_product();
    }
    public function addcart(Request $req)
    {
        $req->validate([
            'email'=>'required|min:2|max:30',
            'proid'=>'required|min:2|max:30',
            'qty'=>'required',
            'size'=>'required'
        ],[
            'proid.required'=>'Product Id can not be empty',
            'proid.min'=>'Product Id contain minimum 2 character',
            'proid.max'=>'Product Id contain maximum 30 character',
            'email.required'=>'Email can not be empty',
            'qty.required'=>'Quantity can not be empty',
            'size.required'=>'Size can not be empty',
        ]);
        $res_ins = new add_to_cart();
        $res_ins->Pro_id=$req->proid;
        $res_ins->Email=$req->email;
        $res_ins->Quantity=$req->qty;
        $res_ins->Size=$req->size;
    
    if( $res_ins->save()){
        Return $this->fetch_cart();
    }
    else{
        echo'Cart Addition Failed';
    }
    }
public function fetch_cart()
{
    $cart=add_to_cart::select()->get();
    Return view('cart',compact('cart'));
}
public function delete_cart($email)
{
    $data = add_to_cart::where('Email',$email)->update(array('Status'=>'Deactive'));
    Return $this->fetch_cart();
}
public function active_cart($email)
{
    $data = add_to_cart::where('Email',$email)->update(array('Status'=>'Active'));
    Return $this->fetch_cart();
}
public function logout()
{
    if(session()->has('email2') && session()->has('password2'))
    {
        session()->forget('email2');
        session()->forget('password2');
        return redirect('login');
    }
}
public function review(Request $req)
{
    $req->validate([
        'email'=>'required|email',
        'pro'=>'required',
        'rate'=>'required|min:1|max:5',
        'comment'=>'required',
    ],[
        'email.required'=>'Email can not be empty',
        'pro.required' =>'product id cannot be empty',
        'rate.required' =>'Rate cannot be empty',
        'rate.min' =>'Rate cannot be less than 1',
        'rate.min' =>'Rate cannot be more than 5',
        'comment.required' =>'Hit some Comment brother..'
    ]);
    $res_ins = new review;
    $res_ins->Pro_id=$req->pro;
    $res_ins->Rating=$req->rate;
    $res_ins->Text_review=$req->comment;
    $res_ins->Email=$req->email;

if( $res_ins->save()){
    Return $this->fetch_review();
}
else{
    echo'Review Addition Failed';
}
Return $this->fetch_review();
}

public function offer_data(Request $req)
{
    $req->validate([
        'proid'=>'required',
        'proname'=>'required',
        'proprice'=>'required',
        'offerpercent'=>'required',
        'offerprice'=>'required',
    ],[
        'proid.required'=>'Product Id can not be empty',
        'proname.required'=>'Product name can not be empty',
        'proprice.required'=>'Product price can not be empty',
        'offerpercent.required'=>'Offer Percentage can not be empty',
        'offerprice.required'=>'Offer Price name can not be empty',
    ]);

    $res_ins = new offer_discount();
    $res_ins->Pro_id=$req->proid;
    $res_ins->Pro_name=$req->proname;
    $res_ins->Pro_price=$req->proprice;
    $res_ins->Offer_percentage=$req->offerpercent;
    $res_ins->Offer_price=$req->offerprice;
    $res_ins->Status="Available";

if( $res_ins->save()){
    Return $this->fetch_offer();
}
else{
    echo'Product Entry Failed';
}
Return $this->fetch_offer();
}
public function fetch_offer()
{
    $offer=offer_discount::select()->get();
    Return view('offer',compact('offer'));
}
public function unavailable_offer($proid)
{
    $data = offer_discount::where('Pro_id',$proid)->update(array('Status'=>'Unavailable'));
    Return $this->fetch_offer();
}
public function available_offer($proid)
{
    $data = offer_discount::where('Pro_id',$proid)->update(array('Status'=>'Available'));
    Return $this->fetch_offer();
}
public function delete_offer($proid)
{
    $data = offer_discount::where('Pro_id',$proid)->delete();
    Return $this->fetch_offer();
}
}

