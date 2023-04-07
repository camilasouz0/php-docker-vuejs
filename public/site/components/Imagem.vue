<li id="li-obito" style="display: none">
   <span class="text">
      {{  getFile(file) }}
   </span>
   <small class="badge badge-info">{{ calcularTamanho(file) }}</small>
   <div class="tools" style="display:block !important; float: left !important;">
      <div class="input-group input-group-sm">
      <small>
         <a href="javascript:void(0);" @click="removerArquivo(file)" data-toggle="tooltip" data-placement="top"
            :title="'Excluir'" :data-original-title="'Excluir'" class="btn btn-danger btn-sm mr-1">
            <i class="fas fa-trash-alt"></i>
         </a>
      </small>
      <small>
         <a href="javascript:void(0);"  @click="visualizarArquivo(file)" data-toggle="tooltip"
            data-placement="top" :title="'Visualizar'" :data-original-title="'VISUALIZAR '"
            class="btn btn-info btn-sm ">
            <i class="fas fa-eye"></i>
         </a>
      </small>
      </div>
   </div>
</li>