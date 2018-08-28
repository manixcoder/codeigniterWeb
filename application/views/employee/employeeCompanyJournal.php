<div class="content-wrapper">
  <section class="content-header">
    <h1>Journal Page<small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Journal Page</li>
    </ol>
  </section>
  <section class="content">
  	<script>
         // not needed, just an example of listening to events triggered by the plugin
         $('body').on('duplicate.error', function(ev){
           console.log('refused to add/remove', this);
           $(ev.target).addClass('error');
           setTimeout(function(){
             $(ev.target).removeClass('error');
           }, 1500);
         });
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    	
    </script>
    <script src="<?php echo base_url();?>/assets/js/jquery.duplicate.js">
    	
    </script>
    <script type="text/javascript">
    	var _gaq = _gaq || [];
    	_gaq.push(['_setAccount', 'UA-36251023-1']);
    	_gaq.push(['_setDomainName', 'jqueryscript.net']);
    	_gaq.push(['_trackPageview']);
    	(function() {
    		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    	})();
    </script>
    <script>
    	function appendText(){
    		var txt1 = "<p><input type='test' name='description[]' placeholder='Description'/><select name='accounts'><option value=''>Select Accounts</option><option value='Revenue'>Revenue</option><option value='CostofgoodsSold'>Cost of goods sold</option><option value='OtherRevenue'>Other revenue</option><option value='Expenses'>Expenses</option><option value='BankandLiquidAssets'>Bank and liquid assets</option><option value='Fixedassets'>Fixed assets</option><option value='CurrentLiabilities'>Current liabilities</option><option value='CreditCards'>Credit cards</option><option value='VATPayable'>VAT Payable</option><option value='NonCurrentLiabilities'>Non-current liabilities</option></select><input type='text' name='accounts[]' placeholder='Accounts'/><input type='text' name='vat[]' placeholder='VAT rate'/><input type='text' name='credit[]' placeholder='Credit'/><input type='text' name='debit[]' placeholder='Debit'/><input type='text' name='contraAccount[]' placeholder='Balancing account'/><button onclick='appendText()'>+</button><div class='box-footer'></div></p>";
       		$(".box-footer").append(txt1);
       	}
    </script>
    <div class="box">
    	<div class="box-header with-border">
    		<h3 class="box-title">Journal</h3>
    		<div class="box-tools pull-right">
    			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i>
       			</button>
       			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i>
       			</button>
       		</div>
       	</div>
       	<div class="box-body">
       		<p>
       			<button data-duplicate-add="email">+ Add Transaction</button>
       			<div data-duplicate="email" data-duplicate-min="0" style="">
       				<!-- <form action="#" method="post"> -->
       				<input type="checkbox" name="vehicle1" value="Bike">
       				<select name='type'>
       					<option value="j">J</option>
       					<option value="c">C</option>
       				</select>
       				<input type='text' name='voucherNo[]' placeholder='Voucher No'/>
       				<input type="text" id="datepicker2" value="<?php echo date('Y-m-d');?>" class="form-control pull-right" name="entryDate[]"/>
       				<input type='file' id="product_image" name='attaichment[]' accept="image/png, image/jpeg" multiple/>
       				<div>
       					<input type='test' name='description[]' placeholder='Description'/>
       					<select name='accounts'>
       						<option value="">Select Accounts</option>
       						<option value="Revenue">Revenue</option>
       						<option value="CostofgoodsSold">Cost of goods sold</option>
       						<option value="OtherRevenue">Other revenue</option>
       						<option value="Expenses">Expenses</option>
       						<option value="BankandLiquidAssets">Bank and liquid assets</option>
       						<option value="Fixedassets">Fixed assets</option>
       						<option value="CurrentLiabilities">Current liabilities</option>
       						<option value="CreditCards">Credit cards</option>
       						<option value="VATPayable">VAT Payable</option>
       						<option value="NonCurrentLiabilities">Non-current liabilities</option>
       					</select>
       					<input type='text' name='accounts[]' placeholder='Accounts'/>
       					<input type='text' name='vat[]' placeholder='VAT rate'/>
       					<input type='text' name='credit[]' placeholder='Credit'/>
       					<input type='text' name='debit[]' placeholder='Debit'/>
       					<select name='contraAccount'>
       						<option value="">Select Balancing account</option>
       						<option value="Bank">Bank</option>
       						<option value="CostofgoodsSold">cost of goods sold</option>
       						<option value="Subcontractors">Subcontractors</option>
       						<option value="AccountReceivable">Account Receivable</option>
       						<option value="DepositsAndPrepaymentsToVendors">Deposits and prepayments to vendors</option>
       						<option value="AccountPayable">Account payable</option>
       						<option value="LineOfCredit">Line of credit</option>
       						<option value="DepositsAndPrepaymentFromCustomers">Deposits and prepayment from customers</option>
       						<option value="CommonStack">Common Stack</option>
       						<option value="RetainedEarings">Retained earings</option>
       						<option value="CapitalContributed">Capital contributed</option>
       						<option value="Accounting">Accounting</option>
       					</select>
       					<!-- <button onclick='appendText()'>+</button> -->
       					<div class="box-footer"></div>
       				</div>
       				<!-- <button data-duplicate-add="email">+</button> -->
       				<button data-duplicate-remove="email">-</button><br><br><br>
       			<!-- </form> -->
       			</div>
       			<!--
       				<input type='test' name='description[]' placeholder='Description'/>
       				<select name='accounts'>
       					<option value="">Select accounts</option>
       					<option value="Revenue">Revenue</option>
       					<option value="Costofgoodssold">Cost of goods sold</option>
       					<option value="Otherrevenue">Other revenue</option>
       					<option value="Expenses">Expenses</option>
       					<option value="Bankandliquidassets">Bank and liquid assets</option>
       					<option value="Fixedassets">Fixed assets</option>
       					<option value="Currentliabilities">Current liabilities</option>
       					<option value="Creditcards">Credit cards</option>
       					<option value="VATPayable">VAT Payable</option>
       					<option value="Noncurrentliabilities">Non-current liabilities</option>
       				</select>
       				<input type='text' name='accounts[]' placeholder='Accounts'/>
       				<input type='text' name='debit[]' placeholder='Debit'/>
       				<input type='text' name='credit[]' placeholder='Credit'/>
       				<button onclick='appendText()'>+</button>
       			-->
          </p>
      </div>
      
    </div>
  </section>
</div>