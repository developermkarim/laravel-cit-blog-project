<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutPage()
    {
        $aboutText = Page::where(['about_status'=>'1'])->orWhere('about_status','0')->first();
        return view('backend.common-pages.about',compact('aboutText'));
    }

    public function updateAboutPage(Request $request)
    {
        $about = Page::where(['about_status'=>1])->orWhere('about_status','0')->first();

        $about->about_title = $request->about_title;
        $about->about_details = $request->about_details;
        $about->about_status =  $request->status;
        // dd($about);
        if($about->save()){
            $notification=[
                'message'=>'about data updated successfully',
                'alert-type'=>'success',
            ];

            return redirect()->back()->with($notification);
        }

    }

    public function contactPage()
{
    $contactText = Page::where(['contact_status'=>'1'])->orWhere('contact_status','0')->first();
    return view('backend.common-pages.contact',compact('contactText'));
}

public function updateContactPage(Request $request)
{
    $contact = Page::findOrFail(1);

    $contact->contact_title = $request->contact_title;
    $contact->contact_details = $request->contact_details;
    $contact->contact_map = $request->contact_map;
    $contact->contact_status =  $request->status;
    // dd($contact);
    if($contact->save()){
        $notification=[
            'message'=>'contact data updated successfully',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($notification);
    }

}

public function FAQPage()
{
    $FAQText = Page::select('faq_title','faq_details','faq_status')->first();
    return view('backend.common-pages.FAQ',compact('FAQText'));
}

public function updateFAQPage(Request $request)
{
    $FAQ = Page::findOrFail(1);

    $FAQ->faq_title = $request->faq_title;
    $FAQ->faq_details = $request->faq_details;
    $FAQ->faq_status =  $request->faq_status;
    // dd($FAQ);
    if($FAQ->save()){
        $notification=[
            'message'=>'FAQ data updated successfully',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($notification);
    }

}

public function disclaimerPage()
{
    $disclaimerText = Page::where(['disclaimer_status'=>'1'])->orWhere(['disclaimer_status'=>'0'])->first();
    return view('backend.common-pages.disclaimer',compact('disclaimerText'));
}

public function updatedisclaimerPage(Request $request)
{
    $disclaimer = Page::findOrFail(1);

    $disclaimer->disclaimer_title = $request->disclaimer_title;
    $disclaimer->disclaimer_details = $request->disclaimer_details;
    $disclaimer->disclaimer_status = $request->disclaimer_status;
    // dd($disclaimer);
    if($disclaimer->save()){
        $notification=[
            'message'=>'disclaimer data updated successfully',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($notification);
    }

}

public function termsPage()
{
    $termsText = Page::where(['terms_status'=>'1'])->orWhere(['terms_status'=>'0'])->first();
    return view('backend.common-pages.terms-condition',compact('termsText'));
}

public function updatetermsPage(Request $request)
{
    $terms = Page::findOrFail(1);

    $terms->terms_title = $request->terms_title;
    $terms->terms_details = $request->terms_details;
    $terms->terms_status = $request->terms_status;
    // dd($terms);
    if($terms->save()){
        $notification=[
            'message' => 'terms data updated successfully',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($notification);
    }

}

public function privacyPage()
{
    $privacyText = Page::where(['privacy_status'=>'1'])->orWhere(['privacy_status'=>'0'])->first();
    return view('backend.common-pages.privacy-condition',compact('privacyText'));
}

public function updateprivacyPage(Request $request)
{
    $privacy = Page::findOrFail(1);

    $privacy->privacy_title = $request->privacy_title;
    $privacy->privacy_details = $request->privacy_details;
    $privacy->privacy_status = $request->privacy_status;
    // dd($privacy);
    if($privacy->save()){
        $notification=[
            'message' => 'privacy data updated successfully',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($notification);
    }

}


/* Data Show For User , Methods Here */

public function UserAboutPage()
{
    $about = Page::where(['about_status'=>'1'])->select('about_details','about_title')->first();
    
    return view('frontend.pages.about',compact('about'));
}


public function UserFaqPage()
{
    $faq = Page::where(['faq_status'=>'1'])->select('faq_details')->first();
    //  dd($faq->faq_details);
    return view('frontend.pages.faq',compact('faq'));
}

public function UserContactPage()
{
    $contact = Page::where(['contact_status'=>'1'])->select('contact_details','contact_title')->first();
    
    return view('frontend.pages.contact',compact('contact'));
}

public function UserPrivacyPage()
{
    $privacy = Page::where(['privacy_status'=>'1'])->select('privacy_details')->first();
    
    return view('frontend.pages.privacy',compact('privacy'));
}

public function UserTermsPage()
{
    $terms = Page::where(['terms_status'=>'1'])->select('terms_details')->first();
    
    return view('frontend.pages.terms',compact('terms'));
}

public function UserDisclaimerPage()
{
    $disclaimer = Page::where(['disclaimer_status'=>'1'])->select('disclaimer_details')->first();
    
    return view('frontend.pages.disclaimer',compact('disclaimer'));
}


}
