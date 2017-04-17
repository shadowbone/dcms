<template id="menu-index">
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
              <div class="widget-main">
                <div class="row">
                  <div class="col-sm-3">
                    <button class="btn btn-sm btn-success btn-default test-button" 
                    data-target="#modal-detail-config"
                    @click="showModal"
                    :data-url="formadd"
                    >
                        <i class="fa fa-plus"></i>
                          Tambah
                    </button>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-xs-12">
                  <div id="menu-nestable"></div>
                  </div>
                </div>

              </div>
            </div>
        </div>
      </div>
    </div>
    <form-input :response="response"></form-input>
</template>

<script>
import formInput from './form-input.vue'
export default {
    name : 'menuIndex',
    data : () => {
        return {
            message : 'Master Menu',
            formadd : urlParent + '/master/menu/add',
            get : urlParent + '/master/menu/get-data',
            response : ''
        }
    },
    mounted(){
      this.getResponse();
      $('.dd-handle a').on('mousedown', function(e){
        e.stopPropagation();
      });
      $('[data-rel="tooltip"]').tooltip();
    },
    methods : {
      getResponse : function () {
        axios.get(this.get)
         .then((response) => {
          var ext = _Vue.extend({
            template : response.data.data,
            methods : {
              addMenu : function ($e) {
                var target = $($e.currentTarget);
              },
              editMenu : function () {
                var target = $($e.currentTarget);
              },
              deleteMenu : function () {
                var target = $($e.currentTarget);
              }
            }
          });
          new ext().$mount(document.getElementById('menu-nestable'));
          $('.dd').nestable();
         })
         .catch((response) => {

         });
      },
      showModal : function ($e) {
        var _this = $($e.currentTarget);
        var templete = _this.data('target');
        var url = _this.data('url');
        $('body').modalmanager('loading');
        axios.get(url)
         .then((response) => {
          $(templete).modal('show');
          this.response = response.data
         })
         .catch((response) => {

         });
      },
    },
    components : {
      formInput
    }
}
</script>