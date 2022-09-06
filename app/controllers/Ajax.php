<?php
class Ajax extends Controller{

	public function __construct(){
		$this->userFunctions = $this->model('Functions');
		$this->userModel = $this->model('User');
    }
 
 public function courses(){
    //  echo $_POST['rid'];
    //  die();
    if(isset($_POST['rid'])){
      $cosdata = $this->userModel->gettotal_courses($_POST['rid']);
echo '<div class="form-group">';
echo '<label for="course_sel" class="font-weight-bold">SELECT THE COURSE OF YOUR INTEREST</label>';
echo '<select class="form-control show-tick mt-3" id="course_sel" name="course_sel">';
    echo ' <option selected disabled>- Course of Interest -</option>';
    foreach($cosdata as $centres){
        echo '<option value="'.$centres->courseid.'">'.$centres->title.'</option>';

    }
echo '</select>';
echo '</div';
    }
}


}
?>