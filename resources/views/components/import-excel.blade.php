           <button type="button" class="btn btn-success mx-1" data-toggle="modal"
               data-target="#import-excel">{{ __('action.import_excel') }} <i class="fas fa-file-excel mx-1"></i></button>



           <div class="modal fade" id="import-excel">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h4 class="modal-title">Default Modal</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <p>One fine body&hellip;</p>

                           <x-adminlte-input-file name="ifPholder" fgroup-class="col-md-12" igroup-size="md" placeholder="Choose a file...">
                               <x-slot name="prependSlot">
                                   <div class="input-group-text bg-lightblue">
                                       <i class="fas fa-upload"></i>
                                   </div>
                               </x-slot>
                           </x-adminlte-input-file>

                           <div class="mb-3">
                               <label for="formFile" class="form-label">Default file input example</label>
                               <input class="form-control" type="file" id="formFile">
                           </div>

                       </div>
                       <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary">Save changes</button>
                       </div>
                   </div>
                   <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
           </div>
