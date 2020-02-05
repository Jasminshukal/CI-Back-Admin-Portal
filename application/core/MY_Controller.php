<?php
class MY_Controller extends CI_Controller
{
	protected $userdata=NULL;
	protected $content_view="";
	protected $layout_view="layout/default";
	protected $include_css=array();
	protected $include_js=array();
	//protected $layout_view="layout/ltf_default";
	
	protected $view_data= array();
	var $settings= array();

	public function __construct()
	{
		parent:: __construct();

		$this->load->database();
		if(!$this->db->table_exists('tbl_settings'))
        {
            redirect(base_url("Migration_tbl"));
		}
		$result_settings=$this->db->query("select * from tbl_settings");
		if($result_settings->num_rows()>0)
		{
			foreach ($result_settings->result() as $field_row) {
				$this->settings[$field_row->field_name]=$field_row->field_value;
			}
		}
		/////////////////////// DEFAULT INCLUDE CSS
		array_push($this->include_css,"global/plugins/font-awesome/css/font-awesome.min.css");
		array_push($this->include_css,"global/plugins/simple-line-icons/simple-line-icons.min.css");
        array_push($this->include_css,"global/plugins/bootstrap/css/bootstrap.min.css");
        array_push($this->include_css,"global/plugins/bootstrap-switch/css/bootstrap-switch.min.css");
        array_push($this->include_css,"global/plugins/sweetalert/lib/sweet-alert.css");
		array_push($this->include_css,"global/plugins/bootstrap-summernote/summernote.css");
		array_push($this->include_css,"global/css/components.css");
		array_push($this->include_css,"global/css/plugins.min.css");
		array_push($this->include_css,"layouts/layout/css/layout.css");
		array_push($this->include_css,"layouts/layout/css/themes/".$this->settings['theam_color'].".min.css");
		array_push($this->include_css,"layouts/layout/css/custom.min.css");
		array_push($this->include_css,"pages/css/custom.css");
		array_push($this->include_css,"global/plugins/crop_image/css/cropper.css");
		array_push($this->include_css,"tags/bootstrap-tagsinput.css");
		/////////////////////// END DEFAULT INCLUDE CSS

		/////////////////////// DEFAULT INCLUDE JS
		array_push($this->include_js,"global/plugins/jquery.min.js");
		array_push($this->include_js,"global/plugins/bootstrap/js/bootstrap.min.js");
        array_push($this->include_js,"global/plugins/js.cookie.min.js");
        array_push($this->include_js,"global/plugins/jquery-slimscroll/jquery.slimscroll.min.js");
        array_push($this->include_js,"global/plugins/jquery.blockui.min.js");
        array_push($this->include_js,"global/plugins/bootstrap-switch/js/bootstrap-switch.min.js");
		array_push($this->include_js,"global/plugins/sweetalert/lib/sweet-alert.min.js");
		array_push($this->include_js,"global/scripts/app.min.js");
        array_push($this->include_js,"layouts/layout/scripts/layout.min.js");
        array_push($this->include_js,"layouts/layout/scripts/demo.min.js");
        array_push($this->include_js,"layouts/global/scripts/quick-sidebar.min.js");
        array_push($this->include_js,"global/plugins/ckeditor/ckeditor.js");
        array_push($this->include_js,"tags/bootstrap-tagsinput.js");
        array_push($this->include_js,"global/plugins/crop_image/js/cropper.js");
		/////////////////////// END DEFAULT INCLUDE JS
		$this->layout_view=$this->settings['layout'];
	}

	public function check_permission($arr,$name)
	{
		foreach ($arr as $key => $value) {
			if($key==$name)
			{
				if($value==1)
					return 1;
			}
		}
		return 0;
	}/// check permission for admin pages

	public function _output()
	{
		
		if ($this->content_view !== FALSE && empty($this->content_view))
			$this->content_view = $this->router->class .'/'. $this->router->method;


		// selecting view and make data
		$content_data = file_exists(APPPATH. 'views/'.$this->content_view.EXT) ? $this->load->view($this->content_view,$this->view_data,TRUE):FALSE;

		// put data into the layout
		if($content_data)
		{
			echo $this->load->view($this->layout_view,array("data" => $content_data ,"include_css" => $this->include_css,"include_js"=>$this->include_js),TRUE);
		}
		else
		{
			echo "file does not exists";
		}

	}


}

?>