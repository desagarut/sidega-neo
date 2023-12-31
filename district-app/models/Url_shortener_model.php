<?php defined('BASEPATH') || exit('No direct script access allowed');

class Url_shortener_model extends CI_Model
{
    public function url_pendek($url)
    {
        $id               = $this->add_url($url);
        $url_data         = $this->get_url_by_id($id);
        $data['url_data'] = $url_data;

        return site_url('v/' . $url_data->alias);
    }

    public function add_url($url)
    {
        $data = [
            'url'     => (string) $url,
            'alias'   => (string) $this->random_code(6),
            'created' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('urls', $data);

        return $this->db->insert_id();
    }

    public function get_url_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('urls');
        $this->db->where('id', (int) $id);
        $result = $this->db->get()->row_object();

        return (count($result) > 0) ? $result : false;
    }

    public function get_url($alias)
    {
        $this->db->select('*');
        $this->db->from('urls');
        $this->db->where('alias', (string) $alias);
        $result = $this->db->get()->row_object();

        return (count($result) > 0) ? $result : false;
    }

    public function random_code($length)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
    }

    public function encode_id($plainText)
    {
        $key         = $this->config->item('encryption_url') . time();
        $random_code = $this->random_code(20);
        $base64      = base64_encode($random_code . ',' . $plainText . ',' . $key . ',' . $plainText);
        $base64url   = strtr($base64, '+/=', '-  ');

        return trim($base64url);
    }

    public function decode_id($plainText)
    {
        $base64url = strtr($plainText, '-  ', '+/=');
        $base64    = base64_decode($base64url, true);
        $exp       = explode(',', $base64);

        return ($exp[1] != $exp[3]) ? $plainText : $exp[1];
    }
}
