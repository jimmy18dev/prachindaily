<?php
class ImageModel extends Database{

	public function CreateProcess($param){
		parent::query('INSERT INTO base_image(im_page_id,im_people_id,im_caption,im_filename,im_format,im_create_time,im_update_time,im_ip,im_type,im_status) VALUE(:page_id,:people_id,:caption,:filename,:format,:create_time,:update_time,:ip,:type,:status)');

		parent::bind(':page_id', 		$param['page_id']);
		parent::bind(':people_id', 		$param['people_id']);
		parent::bind(':caption', 		$param['caption']);
		parent::bind(':filename', 		$param['filename']);
		parent::bind(':format', 		$param['format']);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':ip',				parent::GetIpAddress());
		parent::bind(':type',			$param['type']);
		parent::bind(':status',			$param['status']);

		parent::execute();
		return parent::lastInsertId();
	}

	public function ClearCoverProcess($param){
		parent::query('UPDATE base_image SET im_type = "normal" WHERE im_page_id = :page_id');
		parent::bind(':page_id', 		$param['page_id']);
		parent::execute();
	}
}
?>