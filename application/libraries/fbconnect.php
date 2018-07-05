<?php
    include(APPPATH . 'libraries/facebook.php');
    class Fbconnect extends Facebook {
      public $user = null;
      public $userId = null;
        public function Fbconnect() {
            $CI = &get_instance();
            $CI->config->load('facebook', TRUE);
            $config = $CI->config->item('facebook');
            parent::__construct($config);
            parse_str(substr(strrchr($_SERVER['REQUEST_URI'], '?'), 1), $_REQUEST);
            // Se comprueba si está logeado
            // Si se puede tomar la información del usuario
            $this->userId = $this->getUser();
            // Sí tiene una sesión abierta
            if($this->isLogedIn()) {
                try {
                    // Se obtiene la info del usuario
                    $this->user = $this->api('/me');
                }
                catch(FacebookApiException $e) {
                    error_log($e);
                }
            }
        }
        // Devuelve URL foto de perfil
        public function profilePic($uid=FALSE) {
            if(!$uid) {
                $uid = $this->userId;
            }
            return 'http://graph.facebook.com/' . $uid . '/picture';
        }
        // Realizar peticiones a través de FQL: Tabla, Scopes, Array u Objeto, Where
        // $this->fbconnect->fqlQuery('user', 'current_location');
        public function fqlQuery($table, $scopes, $as_object=TRUE, $where='uid=me()') {
            $array = $this->api(array('method'=>'fql.query','query'=>"SELECT " . $scopes . " FROM " . $table . " WHERE " . $where));
            return ($as_object ? json_decode (json_encode ($array[0]), FALSE) : $array[0]);
        }
        // Comprobar si está logeado
        public function isLogedIn() {
            return ($this->userId);
        }
        // Datos del usuario para manejo en controlador
        // $this->fbconnect->userData()->email;
        public function userData($obj=TRUE) {
            if($this->user) {
                return ($obj ? json_decode (json_encode ($this->user), FALSE) : $this->user);
            }
            return array();
        }
        // Acción de login. Directo en el controlador
        // $this->fbconnect->doLogin('http://ejemplo.com/login/facebook', 'email');
        public function doLogin($redirect, $scope='') {
            redirect($this->getLoginUrl(array('redirect_uri' => $redirect, 'scope' => $scope)));
        }
    }