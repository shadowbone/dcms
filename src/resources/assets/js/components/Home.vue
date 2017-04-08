<template>
  <div id="home">
    <div class="row">
      <div class="col-xs-12"> 
        <div class="row">
          <div class="widget-box">
            <div class="widget-header">
              <h4 class="widget-title">
              <i class="ace-icon fa fa-database"></i>
                Home
              </h4>
            </div>
            <br>
            <div class="box-header with-border">
              <form class="form-horizontal no-margin form-filter" >
              </form>
            </div>
            <div class="hr hr-dotted"></div>
            <div>
            </div>
          </div>      
        </div><!-- PAGE CONTENT ENDS -->
      </div><!-- /.col -->
    </div>
  </div>
</template>
<script>
export default {
  name: 'home',
  data() {
  	return {
  		message : 'Halaman Home'
  	}
  },
  ready() {
  	alert('oke');
  }
}
</script>

