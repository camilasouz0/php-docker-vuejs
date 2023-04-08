<div class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="card card-user">
            <div class="card-header">
               <h5 class="card-title">Tipo de Cadastro</h5>
            </div>
            <div class="card-body">
               <form>
                  <div class="row">
                     <div class="col-md-3">
                        <button type="button" @click="redirectGroup()" class="btn btn-outline-primary btn-block btn-round">
                           <i class="fa fa-group fa-2x"></i> Grupo
                        </button>
                     </div>
                     <div class="col-md-3">
                        <button type="button" @click="redirectCategoria()" class="btn btn-outline-primary btn-block btn-round">
                           <i class="fa fa-archive fa-2x"></i> Categoria
                        </button>
                     </div>
                     <div class="col-md-3">
                        <button type="button" @click="redirectImposto()" class="btn btn-outline-primary btn-block btn-round">
                           <i class="fa fa-money fa-2x"></i> Imposto
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>