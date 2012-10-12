<?php
require_once('ip2location.class.php');
class Tracelogin_model extends CI_Model {

    var $useragent;
    var $Browser;
    var $BrowserSplit;
    var $Machine;
    var $mach;
    var $small;
    var $platform;
    var $version;

    function __Constructor()
    {
        parent::CI_Model();
    }

    function browser()
    {

        $u_agent = $this->Browser;
        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = 'MSIE';
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = 'Firefox';
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = 'Chrome';
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = 'Safari';
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = 'Opera';
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = 'Netscape';
        }else
        {
            $bname = 'mobile';
            $ub = 'mobile';
        }

        return $bname;
    }
    function os()
    {
        if (preg_match('/linux/i', $this->useragent))
        {
            $this->platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $this->useragent))
        {
            $this->platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $this->useragent))
        {
            $this->platform = 'windows';
        }
        return $this->platform;
    }

    function iptocountry()
    {
        $ip = new ip2location;
        $ip->open( BASEPATH.'cache/IP-COUNTRY.BIN');
        $record = $ip->getAll($_SERVER['REMOTE_ADDR']);
        return $record->countryShort;
    }

    function trace_in($tz_offset,$flag=0)
    {
        if(isset($_SERVER['HTTP_USER_AGENT']))
        {
            $this->useragent = $_SERVER['HTTP_USER_AGENT'];
        }else
        {
            $this->useragent = '';
        }
        $this->Browser = $this->useragent;
        $this->BrowserSplit = explode('/', $this->useragent);
        $this->load->library('browser_details');
        $browser_details = new Browser_details();
        $this->version = $browser_details->getVersion();
        //$currentdate = strtotime(UserTimezone(getGmtdate(),$this->db_session->userdata("client_time_zone")));
        $sql='INSERT INTO `login_trace` (`id`,`browser`,`version`,`os`,`ip`,`country`,`logged_in`,`logged_out`,`duration`,`timezone_offset`,`session_id`)
                VALUES (NULL,"'.$this->browser().'","'.$this->version.'","'.$this->os().'","'.$_SERVER['REMOTE_ADDR'].'","'.$this->iptocountry().'","'.gmdate("Y-m-d H:i:s").'",NULL,"0","'.(-$tz_offset).'","'.$this->session->userdata('session_id').'")';
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    function trace_out($id,$flag=0)
    {
        $sql='UPDATE `login_trace` SET `logged_out`=\''.gmdate('Y-m-d H:i:s').'\',
				`duration`=UNIX_TIMESTAMP(logged_out)-UNIX_TIMESTAMP(logged_in) WHERE `id`='.$id;
        $this->db->query($sql);
    }

    function trace_inout($id,$flag=0)
    {
        $sql='UPDATE `login_trace` SET `logged_out`=0,`duration`=0 WHERE `id`='.$id;
        $this->db->query($sql);
    }
}

/*CREATE TABLE  `login_trace` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(10) default NULL,
  `browser` varchar(100) default NULL,
  `os` varchar(100) default NULL,
  `ip` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `logged_in` datetime default NULL,
  `logged_out` datetime default NULL,
  `duration` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB


*/
?>