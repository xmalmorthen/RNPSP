<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mybreadcrumb {

	private $breadcrumbs = array();
	private $tags = "";
	
	function __construct()
	{
		$this->tags['open'] = "<ol class='breadcrumbs'>";
		$this->tags['close'] = "</ol>";
		$this->tags['itemOpen'] = "<li><span>";
		$this->tags['itemClose'] = "</span></li>";
	}

	function add($title, $href){		
		if (!$title OR !$href) return;
		$this->breadcrumbs[] = array('title' => $title, 'href' => $href);
	}
	
	function openTag($tags=""){
		if(empty($tags)){
			return $this->tags['open'];
		}else{
			$this->tags['open'] = $tags;
		}
	}
	
	function closeTag($tags=""){
		if(empty($tags)){
			return $this->tags['close'];
		}else{
			$this->tags['close'] = $tags;
		}
	}
	
	function itemOpenTag($tags=""){
		if(empty($tags)){
			return $this->tags['itemOpen'];
		}else{
			$this->tags['itemOpen'] = $tags;
		}
	}
	
	function itemCloseTage($tags=""){
		if(empty($tags)){
			return $this->tags['itemClose'];
		}else{
			$this->tags['itemClose'] = $tags;
		}
	}
	
	function render(){

		if(!empty($this->tags['open'])){
			$output = $this->tags['open'];
		}else{
			$output = '<ol class="breadcrumbs">';
		}
		
		$count = count($this->breadcrumbs)-1;
		foreach($this->breadcrumbs as $index => $breadcrumb){
		
			if($index == $count){
				$output .= '<li class="active"><span>';
				$output .= $breadcrumb['title'];
				$output .= '</span></li>';
			}else{
				$output .= ($this->tags['itemOpen'])?$this->tags['itemOpen']:'<li><span>';
				$output .= '<a href="'.$breadcrumb['href'].'">';
				$output .= $breadcrumb['title'];
				$output .= '</a>';
				$output .= '</span></li>';
			}
			
		}
		
		if(!empty($this->tags['open'])){
			$output .= $this->tags['close'];
		}else{
			$output .= "</ol>";
		}		
		

		return $output;
	}

}
