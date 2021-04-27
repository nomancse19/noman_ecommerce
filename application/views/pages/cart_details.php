<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small><?php echo count($this->cart->contents());?></small>]<a href="<?php echo base_url();?>Products" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
        <hr class="soft"/>
        <div id="detail_cart">
            
        </div>
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity/Update</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Action</th>
            </tr>
              </thead>
              <tbody>
                <?php $content=$this->cart->contents();
                foreach($content as $cart_content){
                ?>  
                <tr>
                  <td> <img width="60" src="<?php echo base_url();?><?php echo $cart_content['options']['image'];?>" alt=""/></td>
                  <td><?php echo $cart_content['name'];?>
                      <br>
                     Product Code -  <?php echo $cart_content['options']['product_code'];?>
                  </td>
                  <td><input type="number" min="1" value="<?php echo $cart_content['qty'];?>" class="qty_set" data-rowid="<?php echo $cart_content['rowid']?>"  style="width:65px"></td>
                  <td><?php echo $this->cart->format_number($cart_content['price']);?></td>
                  <td><?php echo $this->cart->format_number($cart_content['subtotal']);?></td>
                  <td><button type="button" class="remove_cart btn btn-danger" id="<?php echo $cart_content['rowid'];?>"> <i class="icon-remove icon-white"></i></button></td>
                </tr>
                <?php } ?>
                <tr>
                  <td colspan="4" style="text-align:right">Total Price:	</td>
                  <td><?php echo $this->cart->format_number($this->cart->total());?></td>
                </tr>
                <?php if(!$this->cart->total()==0){?>
                <tr>
                  <td colspan="4" style="text-align:right">Shiping Charge:	</td>
                  <td><?php echo number_format($ship=80,2);?></td>
                </tr>
                <?php }else{$ship=0;} ?>
		<tr>
                  <td colspan="4" style="text-align:right"><strong>Total Payable =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> <?php echo $total=$this->cart->format_number($this->cart->total()+$ship); $sdata=array();$sdata['total']=$total;$this->session->set_userdata($sdata); ?></strong></td>
                </tr>
                </tbody>
                
            </table>
		
		
            <table class="table table-bordered">
			<tbody>
            <tr>
                <td> 
                    <form class="form-horizontal">
                    <div class="control-group">
                    <label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
                    <div class="controls">
                    <input type="text" class="input-medium" placeholder="CODE">
                    <button type="submit" class="btn"> ADD </button>
                    </div>
                    </div>
                    </form>
                </td>
            </tr>
				
			</tbody>
			</table>
			
		
	<a href="<?php echo base_url();?>Products" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="<?php echo base_url() ?>Checkout" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.remove_cart').click(function(){
                        var rowid=$(this).attr("id");
			$.ajax({
				url : "<?php echo base_url();?>Cart/delete_cart",
				method : "POST",
				data : {rowid: rowid},
				success :function(data){
                   window.location.reload();
					$('#detail_cart').html(data);
				}
			});
		});
                
                $(document).on('change', '.qty_set', function(){
		   var quantity = $(this).val();
		   var row_id = $(this).data("rowid");
		   $.ajax({
		    url:"<?php echo base_url();?>Cart/update",
		    type:"POST",
		    data:{row_id:row_id,quantity:quantity},
		    success:function(data)
		    {
                      window.location.reload();   
		     $('#detail_cart').html(data);
		     
		    }
  		 });
		});
		
            });
</script>