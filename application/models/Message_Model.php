<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_Model extends CI_Model
{
	public function newMessage($type, $timeClose, $title, $message)
	{
		$allMessage = $this->session->message;
		$next = sizeof($allMessage) + 1;
		$allMessage[$next] = array(
			'type' => $type,
			'timeClose' => $timeClose,
			'title' => $title,
			'message' => $message,
		);

		$this->session->message = $allMessage;
	}

	public function removeMessages()
	{
		$this->session->message = null;
	}
}