<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario almacenado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un error, por favor verifica'));
			}
		}
		$groups = $this->User->Group->find('list');
		$usuarios=$this->User->find('all');
		$results = Set::extract('/User/ubvper11_id', $usuarios);
		if(count($results)==1)
			array_push($results,0);
		$ubvper11s =array('0'=>'SELECCIONE')+$this->User->Ubvper11->find('list',array('fields'=>array('nombre'),'conditions'=>array('Ubvper11.id !='=>$results,'Ubvper11.estatus'=>1)));
		$userSession = $this->Session->read('Auth.User');
		if($userSession['group_id']!=1)
		unset($groups[1]);
		$this->set(compact('groups','ubvper11s'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function validar_nombre()
	{
		//debug($this->data);
			$control='';
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ'));
			$this->User->set($this->request->data);
			$control=$this->User->validates(array('fieldList' => array('username', 'isUnique')));
			$this->set('control',$control);
			$this->layout='ajax';
	}
	
	
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->data['User']['aux']!=$this->data['User']['password2'])
				$this->request->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario modificado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un error, por favor verifica'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$userSession = $this->Session->read('Auth.User');
		if($userSession['group_id']!=1)
		unset($groups[1]);
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuario eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El usuario no puede ser eliminado'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login()
	{
       if ($this->request->is('post')) {
        if ($this->Auth->login()) {
			$user = $this->Session->read('Auth.User');
			if($user['estatus']!=1)
				$this->redirect(array('action' => 'logout'));
			else
            	$this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash('Su usuario o contraseña son incorrectas');
        }
    }
	if ($this->Session->read('Auth.User')) {
        $this->Session->setFlash('Usted ha ingresado!');
        //$this->redirect('/', null, false);
    }
	}
	
	public function logout() {
		//Leave empty for now.
		$this->Session->setFlash('Adios');
		$this->redirect($this->Auth->logout());
	}
	
	
/*	public function beforeFilter() {
    parent::beforeFilter();

    // For CakePHP 2.0
    $this->Auth->allow('*');

    // For CakePHP 2.1 and up
    $this->Auth->allow();
}*/
	public function beforeFilter() {
    parent::beforeFilter();
	$this->Auth->allow('validar_nombre');
    $this->Auth->allow('initDB'); // We can remove this line after we're finished
	}
	
	
	public function initDB() {
    $group = $this->User->Group;
    //Allow jl-software o super usuario
    $group->id = 1;
    $this->Acl->allow($group, 'controllers');

    //Administrador
		$group->id = 2;
		$this->Acl->deny($group, 'controllers');
	  //Ubvbie12s
		$this->Acl->allow($group, 'controllers/Ubvbie12s/index');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/view');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/add');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/edit');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/addAjax');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/consultarBien');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/validar_nombre');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/pdfAsignacion');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/repArticulo');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/pdfCantidad');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/bienvenido');
		
	  //Ubvcar05s
		$this->Acl->allow($group, 'controllers/Ubvcar05s/listCargo');
	  //Ubvden08s
		$this->Acl->allow($group, 'controllers/Ubvden08s/listaDeno');
	  //Ubvdtn07s
		$this->Acl->allow($group, 'controllers/Ubvdtm07s/listRaz');
	  //Ubvdus10s
		$this->Acl->allow($group, 'controllers/Ubvdus10s/index');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/view');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/add');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/edit');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/listDusper');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/listDusmovorigen');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/listDusmovdestino');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/inventario');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/validar_nombre');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/pdfInventario');
	  //Ubvmar01s
		$this->Acl->allow($group, 'controllers/Ubvmar01s/index');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/view');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/add');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/edit');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/addPrincipal');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/validar_nombre');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/actualizarMarca');
		
	  //Ubvmov13s
		$this->Acl->allow($group, 'controllers/Ubvmov13s/index');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/view');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/add');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/depDestino');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/operacionExitosa');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/movimientoM');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/listarFechas');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/pdfMensual');
	  //Ubvper11s
		$this->Acl->allow($group, 'controllers/Ubvper11s/index');
		$this->Acl->allow($group, 'controllers/Ubvper11s/view');
		$this->Acl->allow($group, 'controllers/Ubvper11s/add');
		$this->Acl->allow($group, 'controllers/Ubvper11s/edit');
		$this->Acl->allow($group, 'controllers/Ubvper11s/validar_nombre');
	  //Ubvsub06s
		$this->Acl->allow($group, 'controllers/Ubvsub06s/index');
		$this->Acl->allow($group, 'controllers/Ubvsub06s/view');
		$this->Acl->allow($group, 'controllers/Ubvsub06s/add');
		$this->Acl->allow($group, 'controllers/Ubvsub06s/edit');
		$this->Acl->allow($group, 'controllers/Ubvsub06s/validar_nombre');
		$this->Acl->allow($group, 'controllers/Ubvsub06s/listSub');
	  //Ubvuad09s
		$this->Acl->allow($group, 'controllers/Ubvuad09s/index');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/view');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/add');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/edit');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/validar_nombre');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/listUad');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/listMov');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/listMovd');
	  //users
		$this->Acl->allow($group, 'controllers/Users/index');
		$this->Acl->allow($group, 'controllers/Users/view');
		$this->Acl->allow($group, 'controllers/Users/add');
		$this->Acl->allow($group, 'controllers/Users/edit');
		$this->Acl->allow($group, 'controllers/Users/validar_nombre');
		$this->Acl->allow($group, 'controllers/Users/login');
		$this->Acl->allow($group, 'controllers/Users/logout');
	  //groups
		$this->Acl->allow($group, 'controllers/Groups/index');
   	  //Ubvbit16s
		$this->Acl->allow($group, 'controllers/Ubvbit16s/ayuda');

		

	
    //Basico 
    $group->id = 3;
    $this->Acl->deny($group, 'controllers');

	  //Ubvbie12s
		$this->Acl->allow($group, 'controllers/Ubvbie12s/index');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/view');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/add');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/edit');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/addAjax');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/consultarBien');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/validar_nombre');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/pdfAsignacion');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/repArticulo');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/pdfCantidad');
		$this->Acl->allow($group, 'controllers/Ubvbie12s/bienvenido');
	  //Ubvcar05s
		$this->Acl->allow($group, 'controllers/Ubvcar05s/listCargo');
	  //Ubvden08s
		$this->Acl->allow($group, 'controllers/Ubvden08s/listaDeno');
	  //Ubvdtn07s
		$this->Acl->allow($group, 'controllers/Ubvdtm07s/listRaz');
	  //Ubvdus10s
		$this->Acl->allow($group, 'controllers/Ubvdus10s/index');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/view');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/listDusper');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/listDusmovorigen');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/listDusmovdestino');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/inventario');
		$this->Acl->allow($group, 'controllers/Ubvdus10s/pdfInventario');
	  //Ubvmar01s
		$this->Acl->allow($group, 'controllers/Ubvmar01s/index');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/view');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/add');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/edit');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/addPrincipal');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/validar_nombre');
		$this->Acl->allow($group, 'controllers/Ubvmar01s/actualizarMarca');
	  //Ubvmov13s
		$this->Acl->allow($group, 'controllers/Ubvmov13s/index');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/view');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/add');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/depDestino');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/operacionExitosa');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/movimientoM');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/listarFechas');
		$this->Acl->allow($group, 'controllers/Ubvmov13s/pdfMensual');
	  //Ubvsub06s
		$this->Acl->allow($group, 'controllers/Ubvsub06s/index');
		$this->Acl->allow($group, 'controllers/Ubvsub06s/view');
		$this->Acl->allow($group, 'controllers/Ubvsub06s/listSub');
	  //Ubvuad09s
		$this->Acl->allow($group, 'controllers/Ubvuad09s/index');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/view');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/listUad');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/listMov');
		$this->Acl->allow($group, 'controllers/Ubvuad09s/listMovd');
	  //users
		$this->Acl->allow($group, 'controllers/Users/index');
		$this->Acl->allow($group, 'controllers/Users/view');
		$this->Acl->allow($group, 'controllers/Users/edit');
		$this->Acl->allow($group, 'controllers/Users/validar_nombre');
		$this->Acl->allow($group, 'controllers/Users/login');
		$this->Acl->allow($group, 'controllers/Users/logout');
		
	  //Ubvbit16s
		$this->Acl->allow($group, 'controllers/Ubvbit16s/ayuda');


    //we add an exit to avoid an ugly "missing views" error message
    echo "all done";
    exit;
}
}
