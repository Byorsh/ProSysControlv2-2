<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i><?=$titulo?> Orden de Reparacion</h1>
            <p>Modulo para <?=$titulo?> Orden de Reparacion<</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Orden de Reparacion</li>
              <li><a href="#"><?=$titulo?> Orden de Reparacion</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Datos del Cliente</h3>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label class="control-label">ID del Cliente</label>
                    <input class="form-control" type="text" placeholder="Introduce el id del cliente">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nombre del Cliente</label>
                    <input class="form-control" type="email" placeholder="Enter email address">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Telefono del Cliente</label>
                    <input class="form-control" type="email" placeholder="Enter email address">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Correo del Cliente</label>
                    <input class="form-control" type="email" placeholder="Enter email address">
                  </div>
                  
                </form>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Datos del Equipo</h3>
              <div class="card-body">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-md-3">Name</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Enter full name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" type="email" placeholder="Enter email address">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Address</label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Gender</label>
                    <div class="col-md-9">
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="gender">Male
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="gender">Female
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Identity Proof</label>
                    <div class="col-md-8">
                      <input class="form-control" type="file">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">I accept the terms and conditions
                        </label>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-3">
                    <button class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Subscribe</h3>
              <div class="card-body3">
                <form class="form-inline">
                  <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" type="text" placeholder="Enter your name">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" type="text" placeholder="Enter your email">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Subscribe</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-default icon-btn" href="?c=taller"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>