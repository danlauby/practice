<?php 

// Portfolio


if(function_exists('vc_map')){

add_action( 'init', 'portfolio_tax1', 999999 );
    function portfolio_tax1()
    {
    $categories = get_terms('portfolio_category' , 'hide_empty=0');
    
    $category_option = array();
    $category_option['All'] = 'all';
    foreach ($categories as $category) {

    $category_option[$category->name] = $category->slug;

    }

vc_map( array(
   "name" => esc_html__("QK Portfolio Grid","construct"),
   "base" => "qk_portfolio",
   "class" => "",
   "category" => esc_html__("Content", "construct"),
   "icon" => "icon-qk",
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Select Category","montblanc"),
         "param_name" => "cat",
         "value" => $category_option,
         "description" => ''
        ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Order","construct"),
         "param_name" => "order",
         "value" => "",
         "description" => 'Example "9"'
      ),array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("On/Off Filter","construct"),
         "param_name" => "filter",
         "value" => "",
         "description" => '"on" or "off"'
      ),
   )
) );

}}
class WPBakeryShortCode_qk_portfolio extends WPBakeryShortCode {
}



if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_html__("QK Portfolio Carousel","construct"),
   "base" => "qk_portfolio_slider",
   "class" => "",
   "category" => esc_html__("Content", "construct"),
   "icon" => "icon-qk",
   "params" => array(
    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Order","construct"),
         "param_name" => "order",
         "value" => "",
         "description" => 'Example "5"'
      )
   )
) );

}
class WPBakeryShortCode_qk_portfolio_slider extends WPBakeryShortCode {
}


if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_html__("QK News","construct"),
   "base" => "qk_news",
   "class" => "",
   "category" => esc_html__("Content", "construct"),
   "icon" => "icon-qk",
   "params" => array(
    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Order","construct"),
         "param_name" => "order",
         "value" => "",
         "description" => 'Example "5"'
      )
   )
) );

}
class WPBakeryShortCode_qk_news extends WPBakeryShortCode {
}


// Portfolio


if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_html__("QK About Post","construct"),
   "base" => "qk_about",
   "class" => "",
   "category" => esc_html__("Content", "construct"),
   "icon" => "icon-qk",
   "params" => array(
    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title","construct"),
         "param_name" => "title",
         "value" => "",
         "description" => 'Your Title'
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Sub Title","construct"),
         "param_name" => "sub_title",
         "value" => "",
         "description" => 'Your Sub Title'
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Your Link","construct"),
         "param_name" => "link",
         "value" => "",
         "description" => 'Custom Link'
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon","construct"),
         "param_name" => "icon",
         "value" => "",
         "description" => 'Your Fontawesome icon class'
      )
   )
) );

}
class WPBakeryShortCode_qk_about extends WPBakeryShortCode {
}



//QK Flexslider
vc_map( array(
    "name" => esc_html__("QK Team Wrapper", "construct"),
    "base" => "qk_team_wrap",
    "as_parent" => array('only' => 'qk_team'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_construct" => true,
    "show_settings_on_create" => false,
    "params" => array(
        // add params same as with any other content construct
        array(
            "type" => "textfield",
            "heading" => esc_html__("Class", "construct"),
            "param_name" => "class",
            "description" => 'example "bnr-slide-2"',
        )
    ),
    "js_view" => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_qk_team_wrap extends WPBakeryShortCodesContainer {
    }
}



if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_html__("QK Team","construct"),
   "base" => "qk_team",
   "class" => "",
   "category" => esc_html__("Content", "construct"),
   "icon" => "icon-qk",
   "content_construct" => true,
   "as_child" => array('only' => 'qk_team_wrap'),
   "params" => array(
   
      
     array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Avatar","construct"),
         "param_name" => "image",
         "value" => "",
         "description" => 'Your member avatar'
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Name","construct"),
         "param_name" => "name",
         "value" => "",
         "description" => 'Your member name'
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Job","construct"),
         "param_name" => "job",
         "value" => "",
         "description" => 'Your member Job'
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Facebook Url","construct"),
         "param_name" => "facebook",
         "value" => "",
         "description" => ''
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Twitter Url","construct"),
         "param_name" => "twitter",
         "value" => "",
         "description" => ''
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Google Plus Url","construct"),
         "param_name" => "google",
         "value" => "",
         "description" => ''
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Linkedin Url","construct"),
         "param_name" => "linkedin",
         "value" => "",
         "description" => ''
      ),array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description","construct"),
         "param_name" => "content",
         "value" => "",
         "description" => 'About your member'
      )
   )
) );

}
class WPBakeryShortCode_qk_team extends WPBakeryShortCode {
}



if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_html__("QK Gmap","construct"),
   "base" => "qk_gmap",
   "class" => "",
   "category" => esc_html__("Content", "construct"),
   "icon" => "icon-qk",
   "params" => array(
   
      
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Latitude","construct"),
         "param_name" => "lat",
         "value" => "",
         "description" => 'Example "-33.880641"'
      ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Longitude","construct"),
         "param_name" => "lon",
         "value" => "",
         "description" => 'Example "151.204298"'
      ),array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("API KEY","konstrukt"),
         "param_name" => "key",
         "value" => "",
         "description" => 'Your google map API key. You can go here to know how to get your key <a href="https://www.latecnosfera.com/2016/06/google-maps-api-error-missing-keymap-error-solved.html" target="_blank">Get Key</a> example key: "AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI"'
      )

   
   )
) );

}
class WPBakeryShortCode_qk_gmap extends WPBakeryShortCode {
}

//QK Flexslider
vc_map( array(
    "name" => esc_html__("QK Testimonial Wrap", "construct"),
    "base" => "qk_testimonial",
    "as_parent" => array('only' => 'qk_testimonial_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_construct" => true,
    "show_settings_on_create" => false,
    "params" => array(
        // add params same as with any other content construct
        array(
            "type" => "textfield",
            "heading" => esc_html__("Class", "construct"),
            "param_name" => "class",
            "description" => 'example "bnr-slide-2"',
        )
    ),
    "js_view" => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_qk_testimonial extends WPBakeryShortCodesContainer {
    }
}



if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_html__("QK Testimonial","construct"),
   "base" => "qk_testimonial_item",
   "class" => "",
   "category" => esc_html__("Content", "construct"),
   "icon" => "icon-qk",
   "content_construct" => true,
   "as_child" => array('only' => 'qk_testimonial'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Name","construct"),
         "param_name" => "name",
         "value" => "",
         "description" => 'Your Testimonial name'
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Job","construct"),
         "param_name" => "job",
         "value" => "",
         "description" => 'Your Testimonial Job'
      ),array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description","construct"),
         "param_name" => "content",
         "value" => "",
         "description" => 'Testimonial Comment'
      )
   )
) );

}
class WPBakeryShortCode_qk_testimonial_item extends WPBakeryShortCode {
}




if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_html__("QK Service Post","construct"),
   "base" => "qk_service",
   "class" => "",
   "category" => esc_html__("Content", "construct"),
   "icon" => "icon-qk",
   "params" => array(
    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title","construct"),
         "param_name" => "title",
         "value" => "",
         "description" => 'Your Title'
      ),array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Your image","construct"),
         "param_name" => "image",
         "value" => "",
         "description" => 'Your image'
      ), array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Your Link","construct"),
         "param_name" => "link",
         "value" => "",
         "description" => 'Custom Link'
      ), array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description","construct"),
         "param_name" => "content",
         "value" => "",
         "description" => 'Your description'
      )
   )
) );

}
class WPBakeryShortCode_qk_service extends WPBakeryShortCode {
}

?>