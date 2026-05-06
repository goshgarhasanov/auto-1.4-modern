<?
class SimpleImage {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 
      $image_info = getimagesize($filename);
	  

      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }

   }

   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {

      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }

   }


function resize() {
$size1 = $size1_1 = imagesx($this->image);
$size2 = $size2_1 = imagesy($this->image);
if($size1<85 and $size2<85)
return;
if($size1>$size2)
{
if($size1>80)
{
$size1_1 = $size1 / ($size1/80);
$size2_1 = $size2 / ($size1/80);
}
if($size2_1>80)
{
$size1_1 = $size1 / ($size2_1/80);
$size2_1 = $size2_1 / ($size2_1/80);
}
}
else
{
if($size2>80)
{
$size2_1 = $size2 / ($size2/80);
$size1_1 = 80;
}
}
$new_image = imagecreatetruecolor($size1_1, $size2_1);
imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $size1_1, $size2_1, $size1, $size2);
$this->image = $new_image;
}
}

function N_SIZE_COPY($file,$ico_name)
{
   $image = new SimpleImage();
   $image->load($file);
   $image->resize();
   $image->save($ico_name);
}


?>