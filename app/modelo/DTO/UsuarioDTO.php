class UsuarioDTO{
class DTO {
    private $id;
    private $nombre;
    private $password;
    private $hash;
    private $fecha;
    
    public function __construct($id, $nombre, $password, $hash, $fecha) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->hash = $hash;
        $this->fecha = $fecha;
    }
    
    // Getters y setters para cada variable
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getHash() {
        return $this->hash;
    }
    
    public function setHash($hash) {
        $this->hash = $hash;
    }
    
    public function getFecha() {
        return $this->fecha;
    }
    
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
}



}