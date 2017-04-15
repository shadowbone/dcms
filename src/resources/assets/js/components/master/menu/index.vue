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
                    @click="getResponse"
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
            <!-- <div class="widget-body"> -->
            <!-- </div> -->
          <!-- </div>       -->
        </div><!-- PAGE CONTENT ENDS -->
      </div><!-- /.col -->
    </div>
</template>

<script>
    export default {
        name : 'menuIndex',
        data : () => {
            return {
                message : 'Master Menu',
                formadd : urlParent + '/master/menu/test-menu'
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
            axios.get(this.formadd)
             .then((response) => {
              $('#menu-nestable').html(response.data.data);
              $('.dd').nestable();
             })
             .catch((response) => {

             });
          }
        }
    }
</script>