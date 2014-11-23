<h2 class="contentsTitle01">求貨登録</h2>

<!-- sectionBase01 -->
<section class="sectionBase01">

<?php echo $this->Form->create('Kyuukasha', array('method'=>'post', 'action'=>'reg', 'name'=>'form1')) ?>
<!-- ftBox -->
<div class="ftBox mB10">
<!-- flL -->
<div class="flL mR10 pL10 w700">
<!-- tablePt01 -->
<table class="tablePt01">
	<tbody>
		<tr rowspan="4">
			<th>種別</th>
			<td><?php echo $this->Form->input('Ky.syubetu', array('type'=>'text', 'size'=>'20', 'class'=>'fText w160 mr20', 'label'=>false, 'div'=>false, 'error'=>false)) ?></td>
		</tr>
		<tr>
			<th>発地域<span class="required">※</span></th>
			<td><?php echo 
				$this->Form->select('Areacode.pref1', $Item->getPrefs(), array('empty'=>true, 'class'=>'fText w100', 'error'=>false));?>入力規則＊＊＊＊＊＊＊</td>
			<th>着地域<span class="required">※</span></th>
			<td><?php echo 
				$this->Form->select('Areacode.pref2', $Item->getPrefs(), array('empty'=>true, 'class'=>'fText w100', 'error'=>false));?></td>
		</tr>
	</tbody>
</table>
<!-- /tablePt01 -->

<!--
<h3 class="hPt01">必須の場合</h3>
<ol>
<li>以下のコードを入れる<br>
<pre class="codeBox01"><code>&lt;span class="required"&gt;※&lt;/span&gt;</code></pre></li>
<li>inputのclassにrequiredContentsを指定する<br>
<pre class="codeBox01"><code>class="requiredContents"</code></pre></li>
</ol>

<input type="text" value="テキストインプット" class="w200">
<br>
<label for="id_1"><input type="checkbox" id="id_1">チェックボックス</label>
<label for="radio01_1"><input type="radio" name="radio01" value="" id="radio01_1">ラジオボタン</label>
<label for="radio01_2"><input type="radio" name="radio01" value="" id="radio01_2">ラジオボタン</label>
<br>
-->
</div>
<!-- flR -->
<div class="flR w300 shinkoBox01">
<div class="title01">登録履歴</div>
<div class="scroll01">
<ul>
<li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前<img src="./img/ico_bell01.png" width="17" height="18" alt="" class="iconImg01"></li>
<li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前</li>
<li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前<img src="./img/ico_bell01.png" width="17" height="18" alt="" class="iconImg01"></li>
<li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前</li>
<li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前<img src="./img/ico_bell01.png" width="17" height="18" alt="" class="iconImg01"></li>
<li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前</li>
<li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前<img src="./img/ico_bell01.png" width="17" height="18" alt="" class="iconImg01"></li>
<li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前</li>
</ul>
</div>
</div>
<!-- /flR -->
<?php echo $this->Form->end(); ?>
</section>
<!-- /sectionBase01 -->





