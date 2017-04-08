<template id="formInput">
    <div class="modal" id="modal-detail-config" data-backdrop="static" data-width="65%" style="z-index: -1">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title"><i class="ace-icon fa fa-edit"></i>&nbsp;<b>{{ data }}</b></h4>
        </div>
        <div></div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-success btn-default" 
          style="margin-left:-11px;"
          @click="savePost()"
          >
          <i class="fa fa-plus"></i>Tambah</button>
        </div>
    </div>
</template>
<script>
export default {
  name: 'formInput',
  props : ['data'],
  data() {
    return {
      message : 'Form Master User'
    }
  },
  methods: {
    savePost: function () {
      alert('oke');
      // Insert AJAX call here...
    }
  }
}
</script>

