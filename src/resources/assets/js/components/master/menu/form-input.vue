<template id="form-input">
    <div class="modal" id="modal-detail-config" data-backdrop="static" data-width="65%" style="z-index: -1">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title"><i class="ace-icon fa fa-edit"></i>&nbsp;<b>{{ response.title }}</b></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal no-margin form-filter" 
          id="form-input" 
          v-bind:action="response.action">
              <div class="form-group">
                  <div class="col-sm-12">
                    <label class="col-sm-2 control-label pull-left" for="form-field-1"> Emails <sup>*</sup></label>
                    <div class="col-md-5">
                      <input type="text" id="form-field-1" class="form-control" name="email" 
                      v-model="response.email">
                    </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                    <label class="col-sm-2 control-label pull-left" for="form-field-1"> Name <sup>*</sup></label>
                    <div class="col-md-5">
                      <input type="text" id="form-field-1" class="form-control" name="name" 
                      v-model="response.name">
                    </div>
                  </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-success btn-default" 
          style="margin-left:-11px;"
          @click="savePost()"
          >
          <i class="fa fa-plus"></i>&nbsp;Tambah</button>
        </div>
    </div>
</template>
<script>
import { actionSaveTest } from '../../../vuex/actions';
export default {
  name: 'formInput',
  props : ['response','datatabels'],
  data() {
    return {
      message : 'Form Master User'
    }
  },
  methods: {
    savePost: function () {
      actionSaveTest($('#form-input'));
      this.datatabels.reload();
    }
  }
}
</script>