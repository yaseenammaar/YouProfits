<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Post_Controller extends CI_Controller {

// Show view Page
public function index(){
$this->load->view("ajax_post_view");
}

// This function call from AJAX
public function user_data_submit() {

$this->load->model('Admin_View_Category');
$subcategory=$this->Admin_View_Category->addSubToSubCategoryToSubCategory($this->input->post('cat_id'));

//Either you can print value or you can send value to database
echo json_encode($subcategory);
}

public function banner_topics(){
	$this->load->model('Admin_View_Category');
    $subcategory=$this->Admin_View_Category->banner_topics($this->input->post('topic_data'));
    echo json_encode($subcategory);
}

public function sub_to_sub_get_data() {

$this->load->model('Admin_View_Category');
$subcategory=$this->Admin_View_Category->search_subtosubtosub_category($this->input->post('cat_id'),$this->input->post('subcat_id'));

//Either you can print value or you can send value to database
echo json_encode($subcategory);
}
//sub_to_sub_to_sub

public function sub_to_sub_to_sub() {
$this->load->model('Admin_View_Category');
$subcategory=$this->Admin_View_Category->search_subtosubtosubtosub($this->input->post('cat_id'),$this->input->post('subcat_id'), $this->input->post('subtosub'));

//Either you can print value or you can send value to database
echo json_encode($subcategory);
}


}

