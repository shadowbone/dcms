<template id="formInput">
    <div class="modal" id="modal-detail-config" data-backdrop="static" data-width="65%" style="z-index: -1">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title"><i class="ace-icon fa fa-edit"></i>&nbsp;<b>{{ response.title }}</b></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal no-margin form-filter" >
              <div class="form-group">
                  <div class="col-sm-12">
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Email </label>
                    <div class="col-md-5">
                      <input type="text" id="form-field-1" class="form-control" name="email" 
                      v-model="response.email">
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
export default {
  name: 'formInput',
  props : ['response'],
  data() {
    return {
      message : 'Form Master User'
    }
  },
  methods: {
    savePost: function () {
      alert(this.response);
      // Insert AJAX call here...
    }
  }
}
</script>

