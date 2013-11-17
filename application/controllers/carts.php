<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of carts
 *
 * @author sonUIT
 */
class carts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index() {
        var_dump($this->cart->contents());
//  $this->cart->destroy();
    }

    public function add() {
        $id = trim($_GET['id']);
        $qty = trim($_GET['qty']);
        $price = trim($_GET['price']);
        $name = trim($_GET['name']);
        if ($this->check($id, $qty)) {
            $data2 = array(
                'id' => $id,
                'qty' => $qty,
                'price' => $price,
                'name' => $name
            );

            $this->cart->insert($data2);
        }
        $this->load->view('cart_homepage_view');
    }

     function check($id, $qty) {
        $data = $this->cart->contents();
        foreach ($this->cart->contents() as $item) {
            if ($item['id'] == $id) {
               // echo $item['id'] . $id;
                $num = intval($item['qty']) + intval($qty);
                $cartitem = array('rowid' => $item['rowid'], 'qty' => $num);
                $this->cart->update($cartitem);
                return false;
            }
        }
        return true;
    }

    public function update() {
        $rowid = trim($_GET['rowid']);
        $qty = trim($_GET['qty']);
        $dt = array('rowid' => $rowid, 'qty' => $qty);
        $this->cart->update($dt);
        $this->load->view('cart_homepage_view');
    }

    public function delete() {
        $rowid = trim($_GET['rowid']);
        $qty = 0;
        $dt = array('rowid' => $rowid, 'qty' => $qty);
        $this->cart->update($dt);
        $this->load->view('cart_homepage_view');
    }

    public function show() {
        $this->load->view('cart_homepage_view');
    }

    public function remove() {
        $this->cart->destroy();
    }

}
?>