<?php
class ReplaceToken {
  public function replacePlaceholderCode()
  {
      // load the instance
      $this->CI =& get_instance();
       
      // get the actual output
      $contents = $this->CI->output->get_output();
       
      // replace the tokens

      $contents = str_replace("Deepa", 'Depa', $contents);
       
      // set the output
      echo $contents;
      return;
  }
}