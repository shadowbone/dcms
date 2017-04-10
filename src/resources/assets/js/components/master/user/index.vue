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
                        <input type="text" id="form-field-1" class="form-control" name="email">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <button 
                      class="btn btn-md btn-white btn-default"
                      @click="search"
                      >
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
                      @click="showModal"
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
                          <th width="5%">No</th>
                          <th width="30%">Email</th>
                          <th>Nama</th>
                          <th width="20%">Aksi</th>
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="body-content"></tbody>
                    </table>
                    </div>
                  </div><!-- /.span -->
              </div>
            <!-- </div> -->
          <!-- </div>       -->
        </div><!-- PAGE CONTENT ENDS -->
      </div><!-- /.col -->
    </div>
    <form-input :response="response" ></form-input>
</template>
<script>
import formInput from './form-input.vue'
import Vue from 'vue/dist/vue.js';

export default {
  name: 'userIndex',
  data : () => {
    return {
      message : 'Master User',
      source : urlParent + '/master/user/get-data',
      formadd : urlParent + '/master/user/add',
      response : '',
      show : '',
      datatabels : null
    }
  },
  mounted(){
    var _self = this;
    this.datatabels = $('#simple-table').myTabel({
              columns: [
                  { data: 'rownum', name: 'rownum' },
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'created_at', name: 'created_at' },
                  { data: 'action', name: 'action' }
              ],
              drawCallback : function () {
                var _parent = _self;
                var $element = $('#simple-table');
                var vmtemp = Vue.extend({
                  template: '<tbody>' + $($element.get(0)).find('tbody').html() + '</tbody>',
                  methods: {
                    showModal : function($e){
                      _parent.showModal($e);
                    }
                  }
                });
                new vmtemp().$mount(document.getElementById('body-content'));
              }
          });
  },
  methods : {
    showModal : function ($e) {
      var _this = $($e.target);
      var templete = _this.data('target');
      var url = _this.data('url');
      this.getResponse(templete);
    },
    getResponse : function (templete) {
      $('body').modalmanager('loading');
      axios.get(this.formadd)
       .then((response) => {
        $(templete).modal('show');
        this.response = response.data
       })
       .catch((response) => {

       });
    },
    search : function ($e) {
      $e.preventDefault();
      this.datatabels.reload();
    }

  },
  components : {
    formInput
  }
}
</script>
