<template id="role-index">
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

            </div>
            <div class="hr hr-dotted"></div>
            <!-- <div class="widget-body"> -->
            <!-- </div> -->
          <!-- </div>       -->
        </div><!-- PAGE CONTENT ENDS -->
      </div><!-- /.col -->
    </div>
</template>

<script>
    export default {
        name : 'roleIndex',
        data : () => {
            return {
                message : 'Master Roles'
            }
        }
    }
</script>