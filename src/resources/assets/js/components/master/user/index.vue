<template id="user-index">
    <div class="row">
      <div class="col-xs-12"> 
        <div class="row">
          <div class="widget-box">
            <div class="widget-header">
              <h4 class="widget-title">
              <i class="ace-icon fa fa-database"></i>
                {{ message }}
              </h4>
            </div>
            <br>
            <div class="box-header with-border">
              <form class="form-horizontal no-margin form-filter" >
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                      <div class="col-md-9">
                        <input type="text" id="form-field-1" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <button class="btn btn-md btn-white btn-default test-button">
                          <i class="ace-icon fa fa-search"></i>
                            Search
                      </button>
                      <button class="btn btn-md btn-white btn-default">
                          <i class="ace-icon fa fa-refresh"></i>
                            Refresh
                      </button>
                    </div>
                  </div>
              </form>
            </div>
            <div class="hr hr-dotted"></div>
            <!-- <div class="widget-body"> -->
              <div class="widget-main">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-sm-3">
                      <button class="btn btn-sm btn-success btn-default test-button" 
                      data-target="#modal-detail-config"
                      v-modal-show
                      style="margin-left:-11px;"
                      :data-url="formadd"
                      >
                          <i class="fa fa-plus"></i>
                            Tambah
                      </button>
                    </div>
                    <table id="simple-table" 
                    class="table  table-bordered table-hover" 
                    data-filter=".form-filter"
                    :data-source="source"
                    >
                      <thead>
                        <tr>
                          <th class="center">
                            <input type="checkbox" class="ace">
                          </th>
                          <th class="detail-col">Details</th>
                          <th>Domain</th>
                          <th>Price</th>
                          <th class="hidden-480">Clicks</th>

                          <th>
                            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                            Update
                          </th>
                          <th class="hidden-480">Status</th>

                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                    </div>
                  </div><!-- /.span -->
              </div>
            <!-- </div> -->
          <!-- </div>       -->
        </div><!-- PAGE CONTENT ENDS -->
      </div><!-- /.col -->
    </div>

    <form-input :data="data"></form-input>
</template>
<script>
import formInput from './form-input.vue'

export default {
  name: 'userIndex',
  props : ['data'],
  data : () => {
    return {
      message : 'Master User',
      source : urlParent + '/master/barang',
      formadd : urlParent + '/master/user/add'
    }
  },
  mounted(){
    $('#simple-table').myTabel({});
  },
  methods : {

  },
  components : {
    formInput
  }
}
</script>
