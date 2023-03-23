<?php
/*
Template Name: Process User Uploads
*/
function addFeaturedThumbnail($attach_id,$post_id){
    $attach_image = set_post_thumbnail( $post_id, $attach_id );
    header("Location: https://charleswhanson.com/thank-you");

}
function createUserPost($args){
    $hashtag_post = array(
      'post_title'    => $args['pname'],
      'post_content'  => $args['content'],
      'comment_status' => 'closed',
      'ping_status'    => 'closed',
      'post_excerpt'   => '',
      'post_name'      => strtolower(preg_replace("/[^A-Za-z]/", '', $args['pname'])),
      'post_parent'    => 0,
      'post_password'  => '',
      'post_status'    => 'pending',
      'post_type'      => 'post',
      'post_category'  => $args['category']
    );

    $new_post_id = wp_insert_post( $hashtag_post );
    if ($new_post_id == 0) {
        echo 'Could not create the post.';
    }
    else {
        addFeaturedThumbnail($args['attachment_id'],$new_post_id);
    }
}

// function latLng($zip){
//   $convert = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
//   $result_string = file_get_contents($convert);
//   $result = json_decode($result_string, true);
//   $result1[] = $result['results'][0];
//   $result2[] = $result1[0]['geometry'];
//   $result3[] = $result2[0]['location'];
//   return $result3[0];
// }

if(isset($_POST['addyourphoto'])){
  function upload_user_file( $file = array() ) {
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );
        $file_return = wp_handle_upload( $file, array('test_form' => false ) );
        if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
            return false;
        } else {
            $filename = $file_return['file'];
            $allowed = array('image/jpg','image/jpeg','image/png');
            if(in_array($file_return['type'], $allowed)){
                $attachment = array(
                    'post_mime_type' => $file_return['type'],
                    'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                    'post_content' => '',
                    'post_status' => 'inherit',
                    'guid' => $file_return['url']
                );
                $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
                wp_update_attachment_metadata( $attachment_id, $attachment_data );
                if( 0 < intval( $attachment_id ) ) {
                  return $attachment_id;
                }
            }
        }
        return false;
  }


  if( ! empty( $_FILES ) ) {
    foreach( $_FILES as $file ) {
      if( is_array( $file ) ) {
        if( $file['size'] <= 3145728) {
            $attachment_id = upload_user_file( $file );
            if($attachment_id != false ){
              $fname = sanitize_text_field($_POST['firstName']);
              $lname = sanitize_text_field($_POST['lastName']);
              $zip = sanitize_text_field($_POST['zipCode']);
              $email = sanitize_text_field($_POST['email']);
              // $location = latLng($zip);

              if( $fname != '' &&  $lname != '' ){
                  $args = array(
                      'pname' => $fname.' '.$lname,
                      'content' => $email,
                      'attachment_id' => $attachment_id
                      // ,
                      // 'category' => array(2,8)
                  );
                  createUserPost($args);
              }
            }
            else {
              header("Location: https://charleswhanson.com/add-your-own-photos/?err=0");
            }
          }
          else {
            header("Location: https://charleswhanson.com/add-your-own-photos/?err=1");
          }
        }
    }
  }


}
