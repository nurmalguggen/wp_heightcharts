<?php
include_once('Hightcharts_tojs.interface.php');
class Hightchart_tojs implements Hightchart_tojs_interface {
	/* primal datas */
	private $options=''; // primal-options
	private $cvs=''; //includes primal-cvs
	
	/* maked datas */
	private $parsed_data;
	private $parsed_options;
	
	/*finished JS code*/
	private $hightchart_js=''; //includes js code to getout
	
	
	
	public function Hightchart_tojs( $cvs, $options){
		$this->cvs=$cvs;
		$this->options=$options;//Standard Linie mit Daten
		
	}
	/**
	 * This function parse the given options
	 *
	 * @return void
	 */
	public function parse_options(){
		
		//switch (explode(',',$this->options)){case title: $return[]='title: {usw}';break;} $this->parsed_options=implode(',',return);
		
		$this->parsed_options="chart: {	renderTo: 'container',	defaultSeriesType: 'area',		inverted: true},
					title: {	text: 'ein Beispiel'},
					subtitle: {	style: {position: 'absolute',right: '0px',	bottom: '10px'	}},
					legend: {	layout: 'vertical',	align: 'right',	verticalAlign: 'top',x: -150,y: 100,floating: true,	borderWidth: 1,	backgroundColor: '#FFFFFF'},
					xAxis: {categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']},
					yAxis: {title: {text: 'x-Axentitel'},labels: {formatter: function() {return this.value;}},min: 0},
					";
		return true;
	}
	public function parse_cvs(){
		//makes cvs to data
		//at time its easy
		$options = explode(',',$this->cvs);
		$return = array();
		foreach ($options as $float){//has to be a float/double itis not allowed jscode insert
			$return[]=floatval($float);
		};
		
		$this->parsed_data="series: [{data: [".implode(',',$return)."]}]});";
	}
	/**
	 * *
	 *
	 * @return (string) the whole js for the header of the site
	 */
	public function get_js(){
		$this->parse_options();
		$this->parse_cvs();
		$js_load_js='';// später kommtnoch in
		$js_header='<!-- Ausgabe Plugin start--><script type="text/javascript">var chart;$(document).ready(function(){chart = new Highcharts.Chart({';
		$js_footer='});	</script><!-- Ausgabe Plugin ende-->';
		$this->hightchart_js = $js_header.$this->parsed_options.$this->parsed_data.$js_footer ;
		
		if($this->hightchart_js !='' ) return $this->hightchart_js;
		else return 'Error: JS not generated';
	}
}

?>