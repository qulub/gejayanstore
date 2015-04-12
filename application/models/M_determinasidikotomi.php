<?php 
class M_determinasidikotomi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here		
	}
	//get hewan 1 kondisi
	public function getHewan1($a)
	{
		if($a==84){$result='011';}
		else if($a==89){$result='012';}
		else if($a==92){$result='015';}
		else if($a==93){$result='016';}
		else if($a==94){$result='017';}
		else if($a==95){$result='018';}
		else if($a==96){$result='019';}
		else if($a==97){$result='020';}
		else if($a==98){$result='021';}
		else if($a==102){$result='024';}
		else if($a==104){$result='025';}
		else if($a==103){$result='026';}
		else if($a==105){$result='027';}
		else if($a==112){$result='031';}
		else if($a==113){$result='032';}
		else if($a==114){$result='033';}
		else if($a==1){$result='034';}
		else if($a==8){$result='039';}
		else if($a==43){$result='063';}
		else{$result='0';}
		return $result;
	}
	//get hewan 2 kondisi
	public function getHewan2($a,$b)
	{
		if($a==71&&$b==73){$result='001';}
		else if($a==71&&$b==74){$result='002';}
		else if($a==72&&$b==75){$result='003';}
		else if($a==72&&$b==76){$result='004';}
		else if($a==85&&$b==86){$result='009';}
		else if($a==85&&$b==87){$result='010';}
		else if($a==88&&$b==90){$result='013';}
		else if($a==88&&$b==91){$result='014';}
		else if($a==99&&$b==100){$result='022';}
		else if($a==99&&$b==101){$result='024';}
		else if($a==9&&$b==10){$result='140';}
		else if($a==31&&$b==39){$result='062';}
		else if($a==30&&$b==33){$result='056';}
		else if($a==44&&$b==45){$result='045';}
		else if($a==68&&$b==70){$result='080';}
		else{$result='0';}
		return $result;
	}
	//get hewan 3 kondisi
	public function getHewan3($a,$b,$c)
	{
		if($a==106&&$b==108&&$c==109){$result='029';}
		else if($a==106&&$b==108&&$c==110){$result='030';}
		else if($a==2&&$b==3&&$c==5){$result='036';}
		else if($a==2&&$b==3&&$c==7){$result='037';}
		else if($a==2&&$b==3&&$c==6){$result='038';}
		else if($a==9&&$b==11&&$c==12){$result='041';}
		else if($a==30&&$b==32&&$c==36){$result='053';}
		else if($a==30&&$b==32&&$c==37){$result='054';}
		else if($a==30&&$b==32&&$c==38){$result='055';}
		else if($a==31&&$b==40&&$c==41){$result='058';}
		else if($a==31&&$b==40&&$c==42){$result='061';}
		else if($a==47&&$b==49&&$c==53){$result='066';}
		else if($a==47&&$b==49&&$c==54){$result='067';}
		else if($a==47&&$b==50&&$c==55){$result='068';}
		else if($a==48&&$b==52&&$c==63){$result='074';}
		else{$result='0';}
		return $result;
	}
	//get hewan 4 kondisi
	public function getHewan4($a,$b,$c,$d)
	{
		if($a==72&&$b==77&&$c==78&&$d==81){$result='005';}
		else if($a==72&&$b==77&&$c==78&&$d==80){$result='006';}
		else if($a==72&&$b==77&&$c==79&&$d==82){$result='007';}
		else if($a==72&&$b==77&&$c==79&&$d==83){$result='008';}
		else if($a==9&&$b==11&&$c==12&&$d==16){$result='042';}
		else if($a==9&&$b==11&&$c==13&&$d==17){$result='043';}
		else if($a==9&&$b==11&&$c==14&&$d==19){$result='050';}
		else if($a==48&&$b==51&&$c==58&&$d==59){$result='071';}
		else if($a==48&&$b==52&&$c==64&&$d==65){$result='075';}
		else if($a==48&&$b==52&&$c==64&&$d==66){$result='076';}
		else{$result='0';}
		return $result;

	}

	public function getHewan5($a,$b,$c,$d,$e)
	{
		if($a==9&&$b==11&&$c==13&&$d==18&&$e==21){$result='047';}
		else if($a==9&&$b==11&&$c==13&&$d==18&&$e==22){$result='048';}
		else if($a==9&&$b==11&&$c==13&&$d==18&&$e==23){$result='049';}
		else if($a==9&&$b==11&&$c==13&&$d==18&&$e==25){$result='051';}
		else if($a==9&&$b==11&&$c==13&&$d==18&&$e==19){$result='052';}
		else if($a==48&&$b==51&&$c==58&&$d==60&&$e==61){$result='072';}
		else if($a==48&&$b==51&&$c==58&&$d==60&&$e==62){$result='073';}
		else{$result='0';}
	}

	public function getHewan6($a,$b,$c,$d,$e,$f)
	{
		if($a==9&&$b==11&&$c==13&&$d==18&&$e==20&&$f==26){$result='046';}
		else{$result='0';}
		return $result;

	}

	public function getHewan7($a,$b,$c,$d,$e,$f,$g)
	{
		if($a==9&&$b==11&&$c==13&&$d==18&&$e==20&&$f==27&&$g==28){$result='044';}
		else if($a==9&&$b==11&&$c==13&&$d==18&&$e==20&&$f==27&&$g==29){$result='045';}
		else{$result='0';}
		return $result;
	}
}