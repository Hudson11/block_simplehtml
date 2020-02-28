<?php

class block_simplehtml extends block_base {

    public function Init( ){
        $this -> title = get_string ('simplehtml', 'bloco_simplehtml') ;
    }

    public function  get_contect(){
        if ($this -> content !== null){
            return $this -> content;
        }

        $this -> content = new stdClass;
        $this -> content -> text = 'O conteudo do nosso bloco SimpleHtml';
        $this -> content -> footer = 'Rodapé aqui';

        return $this -> content;
    }

    public function specialization() {
        if (isset($this->config)) {
            if (empty($this->config->title)) {
                $this->title = get_string('defaulttitle', 'block_simplehtml');
            } else {
                $this->title = $this->config->title;
            }

            if (empty($this->config->text)) {
                $this->config->text = get_string('defaulttext', 'block_simplehtml');
            }
        }
    }

    function has_config(){
        return true;
    }

    public function instance_config_save($data, $nolongerused = false){
        if(get_config('simpleshtml', 'Allow_HTML') == '1' ){
            $data -> text = strip_tags($data->text);
        }

        return parent::instance_config_save($data, $nolongerused);
    }
}
