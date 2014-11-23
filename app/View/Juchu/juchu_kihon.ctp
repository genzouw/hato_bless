<meta charset="utf-8">
<link rel="stylesheet"  type="text/css" href="../../webroot/common/css/import.css">
<link rel="stylesheet"  type="text/css" href="../../webroot/common/css/cmn_style.css">
<link href="../../webroot/common/css/cmn_layout.css" rel="stylesheet" type="text/css">



<!-- mainContents -->
<section id="mainContents">

    <h2 class="contentsTitle01 icoKihontouroku01">基本登録</h2>
    <section class="sectionBase01">

<?php echo $this->Session->flash(); ?>

<?php echo  $this->Form->create('', 
    array( 'id' => 'form1', 'url' => '/juchu/')); ?>

<p class="caution mL10 mB20">システムメッセージ</p>

<div class="ftBox mB0 w1024">
	<div class="mL20 flL w740 mg0">
        
        <table class="w720 mg0 tablePt01">
          <tbody>
          	<tr>
            	<td colspan="6">
                	<div  class=" w720 taR" >
            			<input type="submit" value="参照登録" class="w100 mR10" />
                    </div>
            	</td>
            </tr>
            <tr>
              <th rowspan="2" class="w90 taC">取扱区分 <span class="required">※</span>
   			  </th>
              <td class="w230" colspan="2">
                    <select name="example01" class="requiredContents w230">
                        <option value="XXXXXXX">XXXXXXX</option>
                        <option value="XXXXXXX">XXXXXXX</option>
                        <option value="XXXXXXX">XXXXXXX</option>
                    </select>
              </td>
              <th class="w90 taC">Sys. No.</th>
              <td class="w180" colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">
                    <select name="example01" class="requiredContents w230">
                        <option value="XXXXXXX">XXXXXXX</option>
                        <option value="XXXXXXX">XXXXXXX</option>
                        <option value="XXXXXXX">XXXXXXX</option>
                    </select>
        
              </td>
              <th class="taC"><p>No.</p></th>
              <td class="pd0" colspan="2"><input type="text" class="w180" value="XXXXXXXXXX"></td>
            </tr>
            <tr>
              <th class="w90 taC">法人コード</th>
              <td class="w180">TEXT Box？（不明）</td>
              <td class="w50 pd0"><input type="submit" value="参照" class="w50" /></td>
              <td colspan="3"><input type="submit" value="負担の別" class="w90 mL10" /></td>
            </tr>
            <tr>
              <th class="taC">法人様名</th>
              <td colspan="2"><input type="text" class="w230" value="仕様不明要確認"></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <th class="taC">名前　<span class="required">※</span></th>
              <td><input type="text" class="w180 requiredContents" value="XXXXXXXXXX"></td>
              <td class="pd0" colspan="3">
                                <span class="fzSmall">(例)鳩野　太郎</span><br />
                                <span class="fzSmall">苗字と名前の間は全角スペース1文字分開けてください。</span>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <th class="taC"><p>フリガナ</p></th>
              <td><input type="text" class="w180" value="XXXXXXXXXX"></td>
              <td>&nbsp;</td>
              <th class="taC">メール</th>
              <td class="pd0"><input type="text" class="w180" value="XXXXXXXXXX"></td>
              <td class="pd0">
              <img src="/common/img/ico_mail01.png" width="45" alt="" class="iconImg01 mg0" />
              </td>
            </tr>
            <tr>
              <th class="taC">経由先</th>
              <td>
                <select class="w180" name="example04">
                    <option value="選択してください">選択してください</option>
                    <option value="XXXXXXXX">XXXXXXXX</option>
                    <option value="XXXXXXXX">XXXXXXXX</option>
                    <option value="XXXXXXXX">XXXXXXXX</option>
                </select>
              </td>
              <td>&nbsp;</td>
              <th class="taC">ご紹介</th>
              <td class="pd0" colspan="2"><input type="text" class="w180" value="XXXXXXXXXX"></td>
            </tr>
            <tr>
              <th class="taC">受付日</th>
              <td>&nbsp;</td>
              <td class=" iconImg01">
                    <a href="" class="btnImg icoCal01"></a>
              </td>
              <th class="taC">受付担当</th>
              <td class="w180 pd0"><input type="text" class="w180" value="XXXXXXXXXX"></td>
              <td class="w50 pd0"><input type="submit" value="参照" class="w50" /></td>
            </tr>
          </tbody>
        </table>
        <table class="w740  tablePt01">
          <tbody>
            <tr>
              <td class="w90">&nbsp;</td>
              <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
              <th class="taC">請求先</th>
              <td class="w240">
                <select class="w240" name="example2">
                    <option value="選択してください">現金</option>
                    <option value="XXXXXXXX">XXXXXXXX</option>
                </select>
              </td>
              <th class="w90 taC">営業担当</th>
              <td  class="w180 pd0">
                <input type="text" class="w180" value="XXXXXXXXXX">
              </td>
              <td class="w50 pd0"><input type="submit" value="参照" class="w50" /></td>
            </tr>
            <tr>
              <th class="taC">ご決済</th>
              <td>
                <select class="w230" name="example2">
                    <option value="選択してください">ご本人</option>
                    <option value="XXXXXXXX">XXXXXXXX</option>
                </select>
              </td>
              <th class="taC" rowspan="2">下見担当</th>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
              <td><input type="submit" value="下見手配する" class="w140 mL10" /></td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
        
	</div>
    <div class="flR w260 shinkoBox01">
        <div class="title01">進行状況の変更<?php echo $this->Html->link( '入力する', array(
            'action' => 'progress',
        )); ?></div>
        <div class="text01">
        <table class="tablePt03">
        <tr>
        <th>進行状況</th>
        <td>
        <select name="example03">
        <option value="XXXXXXXX">XXXXXXXX</option>
        <option value="XXXXXXXX">XXXXXXXX</option>
        <option value="XXXXXXXX">XXXXXXXX</option>
        </select>
        </td>
        </tr>
        </table>
        </div>
        
        <div class="title01">進行履歴</div>
        <div class="scroll01">
        <ul>
        <li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前<img src="/common/img/ico_bell01.png" width="17" height="18" alt="" class="iconImg01" /></li>
        <li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前</li>
        <li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前<img src="/common/img/ico_bell01.png" width="17" height="18" alt="" class="iconImg01" /></li>
        <li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前</li>
        <li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前<img src="/common/img/ico_bell01.png" width="17" height="18" alt="" class="iconImg01" /></li>
        <li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前</li>
        <li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前<img src="/common/img/ico_bell01.png" width="17" height="18" alt="" class="iconImg01" /></li>
        <li>yyyy/mm/dd　テキストテキストテキストテキスト　　名前</li>
        </ul>
        </div>

		<div class="w100per mL10">
        	<div class="w100per">
            	分析（共通）
                <select class="w130" name="example">
                <option value="XXXXXXXX">XXXXXXXX</option>
                </select>	
            </div>
        	<div class="w100per">
            	分析（共通）
                <select class="w130" name="example">
                <option value="XXXXXXXX">XXXXXXXX</option>
                </select>	
            </div>
        </div>

    </div>
</div>

        <table class="w970 mL20 mT0 mB20 tablePt01">
          <tbody>
          	<tr>
            	<th class="w110 taC">元請</th>
                <td  class="w190 pd0">
                	<input type="text" class="w190" value="XXXXXXXXXX">
                </td>
                <td  class="w200 pd0">
                	<input type="text" class="w200" value="XXXXXXXXXX">	
                </td>
                <th class="w120 pd0 taC">元請担当</th>
            	<td class="w100 pd0">
                	<input type="text" class="w100" value="XXXXXXXXXX">	
                </td>
                <td class="w160 pd0">
                	<input type="text" class="w160" value="XXXXXXXXXX">	
                </td>
                <td class="w50">
                	<img src="/common/img/ico_mail01.png" width="45" alt="" class="iconImg01 mg0" />
                </td>
            </tr>
          </tbody>
      </table>


<!-- tablePt02 -->
<table class="tablePt02 mL20 mR20 w960">
<tr>
<th class="w50 taC pd0">Act</th>
<th class="w180 taC">開始予定日時<span class="required">※</span></th>
<th class="w150 taC" >終了予定日時</th>
<th class="w520 taC">住所・住居</th>
</tr>
<tr>
<td class=" pd0">
<select class="w50 mB100" name="example">
  <option value="積">積</option>
  <option value="XXXXXXXX">☆</option>
</select>
</td>
<td class="">
	<input type="text" class="w130" value="仕様不明→"  maxlength="8">&nbsp;<a href="" class="btnImg icoCal01 iconImg01"></a><br>
    <label for="radio01_1"><input type="radio" name="radio01" value="" id="radio01_1">時間</label>
	<div class="taC w180">
        <select class="w70" name="example">
        <option value="XXXXXXXX">hh:mm</option>
        </select>
        ～
        <select class="w70" name="example">
        <option value="XXXXXXXX">hh:mm</option>
        </select>
    </div>
    

    <label for="radio01_2"><input type="radio" name="radio01" value="" id="radio01_2">時間帯</label>

	<div class="taC w180">
        <select class="w180" name="example">
        <option value="">デフォ空欄</option>
        </select>
    </div>

</td>
<td valign="top">
	<input type="text" class="w130 mT40" value="hh:mm" maxlength="5">
   	<div class="taC w100per">(例)05:00 </div>

</td>
<td valign="top" class="pd0">
	<label for="id_3"><input type="checkbox" id="id_3" checked>〒</label>
    <input type="text" class="w80" value="nnn-nnnn" maxlength="8">
    <input type="submit" value="参照" class="w50" />
    <input type="text" class="w70" value="">
    <input type="text" class="w160" value="">
    <a href="" class="btnImg icoMap01  iconImg01"></a>
    <a href="" class="btnImg icoCamera01 iconImg01"></a>
	<div class="taL w100per">
        <select class="w100" name="example">
        <option value="XXXXXXXX">住居を選択</option>
        </select>	
        
        <select class="w60" name="example">
        <option value="XXXXXXXX">nn</option>
        </select>
        
        F
        
        <select class="w60" name="example">
        <option value="XXXXXXXX">nn</option>
        </select>
        
        階建
        
        <select class="w60" name="example">
        <option value="XXXXXXXX">階段（デフォ空欄）</option>
        </select>
        
        
        
        <select class="w50" name="example">
        <option value="XXXXXXXX">nn</option>
        </select>
        
        道幅
        
        <select class="w80" name="example">
        <option value="XXXXXXXX">1t</option>
        </select>
    </div>
    <div class="taL w100per btnNumArea01 flR">
        <a href="" class="minus mL110"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
        <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
    	
        <a href="" class="minus mL30"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
        <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
 
 
        <a href="" class="minus mL120"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
        <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
       
    </div>
</td>
</tr>



<tr>
<td class=" pd0">
<select class="w50 mB100" name="example">
  <option value="卸">卸</option>
  <option value="XXXXXXXX">☆</option>
</select>
</td>
<td class="">
	<input type="text" class="w130" value="仕様不明→" maxlength="8">&nbsp;<a href="" class="btnImg icoCal01 iconImg01"></a><br>
    <label for="radio01_1"><input type="radio" name="radio01" value="" id="radio01_1">時間</label>
	<div class="taC w180">
        <select class="w70" name="example">
        <option value="XXXXXXXX">hh:mm</option>
        </select>
        ～
        <select class="w70" name="example">
        <option value="XXXXXXXX">hh:mm</option>
        </select>
    </div>
    

    <label for="radio01_2"><input type="radio" name="radio01" value="" id="radio01_2">時間帯</label>

	<div class="taC w180">
        <select class="w180" name="example">
        <option value="">デフォ空欄</option>
        </select>
    </div>

</td>
<td valign="top">
	<input type="text" class="w130 mT40" value="hh:mm" maxlength="5">
   	<div class="taC w100per">(例)05:00 </div>

</td>
<td valign="top" class="pd0">
	<label for="id_3"><input type="checkbox" id="id_3" checked>〒</label>
    <input type="text" class="w80" value="nnn-nnnn" maxlength="8">
    <input type="submit" value="参照" class="w50" />
    <input type="text" class="w70" value="">
    <input type="text" class="w160" value="">
    <a href="" class="btnImg icoMap01  iconImg01"></a>
    <a href="" class="btnImg icoCamera01 iconImg01"></a>
	<div class="taL w100per">
        <select class="w100" name="example">
        <option value="XXXXXXXX">住居を選択</option>
        </select>	
        
        <select class="w60" name="example">
        <option value="XXXXXXXX">nn</option>
        </select>
        
        F
        
        <select class="w60" name="example">
        <option value="XXXXXXXX">nn</option>
        </select>
        
        階建
        
        <select class="w60" name="example">
        <option value="XXXXXXXX">階段（デフォ空欄）</option>
        </select>
        
        
        
        <select class="w50" name="example">
        <option value="XXXXXXXX">nn</option>
        </select>
        
        道幅
        
        <select class="w80" name="example">
        <option value="XXXXXXXX">1t</option>
        </select>
    </div>
    <div class="taL w100per btnNumArea01 flR">
        <a href="" class="minus mL110"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
        <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
    	
        <a href="" class="minus mL30"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
        <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
 
 
        <a href="" class="minus mL120"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
        <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
       
    </div>
</td>
</tr>

</table>
<!-- /tablePt02 -->

<div class="mL20 mT20 w1024 taL" >
	<input type="submit" value="＋行を増やす" class="w170 mL10" />
</div>


<table class="tablePt05 w960 mL20 mT20">
    <tr>
        <th class="w170 pd0">連絡先</th>
        <td class="w300 pd0"><input type="text" class="w300" value="" maxlength="5"></td>
        <td class="w170 pd0">携帯</td>
        <td class="w300 pd0"><input type="text" class="w300" value="" maxlength="5"></td>
    </tr>
</table>

<table class="tablePt05 w960 mL20 mT20">
    <tr>
        <td class="w170 pd0">
            <select class="w170" name="example">
            <option value="">親御様</option>
            </select>
        </td>
        <td class="w300 pd0">
        	<input type="text" class="w300" value="">
        </td>
        <td class="w170 pd0">
            <select class="w170" name="example">
            <option value="">会社</option>
            </select>
        </td>
        <td class="w300 pd0">
        	<input type="text" class="w300" value="">
        </td>
    </tr>
</table>

<p class="caution w100per taC mT20">初めての案件の場合はここまで入力したら入力内容保持のため一旦保存してください。（受付番号を発番してください。）</p>

<h2 class="contentsTitle01 icoKihontouroku02 openTitle01"><span>基本登録－詳細</span></h2>


<?php echo  $this->Form->end(); ?>

	<table class="tablePt01 w930 mL20 mT20">
      <tbody>
        <tr>
          <th class="taC w120">区分</th>
          <td class="w190">
          	<select class="w170" name="example">
            <option value="">xxx</option>
            </select>
          </td>
          <th class="taC w120">間取り(積)</th>
          <td class="w190">
            <select class="w170" name="example">
            <option value="">xxx</option>
            </select>
          </td>
          <th class="taC w120" rowspan="2">距離</th>
          <td class="w190"><input type="text" class="w180" value=""></td>
        </tr>
        <tr>
          <th class="taC">輸送</th>
          <td>
            <select class="w170" name="example">
            <option value="">xxx</option>
            </select>
          </td>
          <th class="taC">間取り(卸)</th>
          <td>
            <select class="w170" name="example">
            <option value="">xxx</option>
            </select>
          </td>
          <td><input type="button" value="距離計算" onclick="" class="inputBtn01 w180"></td>
        </tr>
        <tr>
          <th class="taC">プラン</th>
          <td>
            <select class="w170" name="example">
            <option value="">xxx</option>
            </select>
          </td>
          <th class="taC">部屋数</th>
          <td>
            <select class="w170" name="example">
            <option value="">xxx</option>
            </select>
          </td>
          <td colspan="2">&nbsp;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </td>
        </tr>
      </tbody>
    </table>
    
<div class="ftBox mB10 w980">
		<div class="flL mR10 w450">

            <table class="tablePt01 w450 mL20">
              <tbody>
                <tr>
                  <th class="w90 taC">予定車輌</th>
                  <td class="w140">
                    <div class="flL mg0">
                        <select class="w70" name="example">
                        <option value="XXXXXXXX">1tワゴン</option>
                        </select>
                    </div>
                    <div class="flL btnNumArea01 mg0">
                                <a href="" class="minus mL0"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
                                <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
        
                    </div>
                  </td>
                  <td  class="w210">
                    <select class="w70" name="example">
                    <option value="XXXXXXXX">nn</option>
                    </select>
                      &nbsp;
                      台
                  </td>
                </tr>
                <tr>
                  <th class="taC">(積日)</th>
                  <td>
                    <div class="flL mg0">
                        <select class="w70" name="example">
                        <option value="XXXXXXXX">2ts</option>
                        </select>
                    </div>
                    <div class="flL btnNumArea01 mg0">
                                <a href="" class="minus mL0"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
                                <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
        
                    </div>
                  </td>
                  <td>
                      <select class="w70" name="example">
                        <option value="XXXXXXXX">nn</option>
                      </select>
                      &nbsp;
                      台
                  </td>
                </tr>
                <tr>
                  <th class="taC">作業人員</th>
                  <td>
                    <div class="flL mg0 btnNumArea01 ">
                               <a href="" class="minus mL0"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
                               <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>

                    </div>
                    <div class="flLmg0">
                        <select class="w70" name="example">
                        <option value="XXXXXXXX">nn</option>
                        </select> 
                    </div>
                  </td>
                  <td>
                    
                    <div class="flR mg0 w110 fzSmall">
                        全
                        <select class="w70" name="example">
                        <option value="XXXXXXXX">nn</option>
                        </select>
                        名
                    </div>
                    <div class="flL w10 fzSmall">
                        名
                    </div>
                    <div class="flL btnNumArea01 mg0 w50 iconImg01">
                                
                                <a href="" class="minus mL0"><img src="/common/img/ico_minus01.png" width="13"  alt="-" /></a>
                                <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" alt="+" /></a>
        
                    </div>
                    
                    
                  </td>
                </tr>
              </tbody>
            </table>

        </div>
        <div class="flL mL10">
        <table height="150">
        		<tr>
                <td valign="middle">
        			<img src="/common/img/ico_arrow01.png" width="22" height="36" alt="" />
                </td>
                </tr>
        </table>
        </div>
        <div class="flR mR10 w450">
            <table class="tablePt01 w450 mL20">
              <tbody>
                <tr>
                  <th class="w90 taC">予定車輌</th>
                  <td class="w140">
                    <div class="flL mg0">
                        <select class="w70" name="example">
                        <option value="XXXXXXXX">1tワゴン</option>
                        </select>
                    </div>
                    <div class="flL btnNumArea01 mg0">
                                <a href="" class="minus mL0"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
                                <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
        
                    </div>
                  </td>
                  <td  class="w210">
                    <select class="w70" name="example">
                    <option value="XXXXXXXX">nn</option>
                    </select>
                      &nbsp;
                      台
                  </td>
                </tr>
                <tr>
                  <th class="taC">(積日)</th>
                  <td>
                    <div class="flL mg0">
                        <select class="w70" name="example">
                        <option value="XXXXXXXX">2ts</option>
                        </select>
                    </div>
                    <div class="flL btnNumArea01 mg0">
                                <a href="" class="minus mL0"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
                                <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>
        
                    </div>
                  </td>
                  <td>
                      <select class="w70" name="example">
                        <option value="XXXXXXXX">nn</option>
                      </select>
                      &nbsp;
                      台
                  </td>
                </tr>
                <tr>
                  <th class="taC">作業人員</th>
                  <td>
                    <div class="flL mg0 btnNumArea01 ">
                               <a href="" class="minus mL0"><img src="/common/img/ico_minus01.png" width="13" height="13" alt="-" /></a>
                               <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" height="13" alt="+" /></a>

                    </div>
                    <div class="flLmg0">
                        <select class="w70" name="example">
                        <option value="XXXXXXXX">nn</option>
                        </select> 
                    </div>
                  </td>
                  <td>
                    
                    <div class="flR mg0 w110 fzSmall">
                        全
                        <select class="w70" name="example">
                        <option value="XXXXXXXX">nn</option>
                        </select>
                        名
                    </div>
                    <div class="flL w10 fzSmall">
                        名
                    </div>
                    <div class="flL btnNumArea01 mg0 w50 iconImg01">
                                
                                <a href="" class="minus mL0"><img src="/common/img/ico_minus01.png" width="13"  alt="-" /></a>
                                <a href="" class="plus"><img src="/common/img/ico_plus01.png" width="13" alt="+" /></a>
        
                    </div>
                    
                    
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>


	<h2 class="contentsTitle01 icoKihontouroku02 openTitle01"><span>基本登録－詳細 －小鳩</span></h2>



    <table class="tablePt01 mL20 w930 mT20">
      <tbody>
        <tr>
          <th class="w110 taC">小鳩区分</th>
          <td class="w190">
            <select class="w170" name="example">
            <option value="XXXXXXXX"></option>
            </select>
          </td>
          <th class="w100 taC">BOX</th>
          <td class="w210">
            <select class="w170" name="example">
            <option value="XXXXXXXX"></option>
            </select>       	
          </td>
          <th class="w100 taC">バラ数</th6>
          <td class="w170"><input type="text" class="w150" value="" maxlength="3"></td>
        </tr>
      </tbody>
    </table>
    
    <table class="tablePt01 mL20 w930">
      <tbody>
        <tr>
          <th class="w130 taC">持込日</th>
          <td class="w270 pd0">
            <select class="w250" name="example">
            <option value="XXXXXXXX"></option>
            </select>
           
          </td>
          <td class="w30">
   				<a href="" class="btnImg icoCal01 iconImg01"></a>
          </td>
          <th class="w180 taC">引取日</th>

          <td class="w230"><input type="text" class="w190" value=""></td>
          <td class="w30"><a href="" class="btnImg icoCal01 iconImg01"></a></td>
        </tr>
      </tbody>
    </table>
    
    <div class="w930 ftBox mL20">
    	<div class="w150 flL">&nbsp;</div>
        <div class="w520 flL taL">(例)20140801</div>
        <div class="w260 flR taL">(例)20140801</div>
    </div>
    
    <table class="tablePt01 mL20 w930">
      <tbody>
        <tr>
          <th class="w110 taC">時間指定</th>
          <td class="w250">
			<label for="id_3"><input type="checkbox" id="id_3">&nbsp;&nbsp;発</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="id_3"><input type="checkbox" id="id_3">&nbsp;&nbsp;着</label>
          </td>
          <th class="w310 taC">休日指定</th>
          <td class="w160">
			<label for="id_3"><input type="checkbox" id="id_3">&nbsp;&nbsp;発</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="id_3"><input type="checkbox" id="id_3">&nbsp;&nbsp;着</label>

          </td>
        </tr>
        
        
        <tr>
          <th class="taC">特定地域</th>
          <td>
			<label for="id_3"><input type="checkbox" id="id_3">&nbsp;&nbsp;発</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="id_3"><input type="checkbox" id="id_3">&nbsp;&nbsp;着</label>

          </td>
          <th class=" taC">特定地域(100km以上)</th>
          <td>
          		<label for="id_3"><input type="checkbox" id="id_3">&nbsp;&nbsp;発</label>&nbsp;&nbsp;&nbsp;&nbsp;
            	<label for="id_3"><input type="checkbox" id="id_3">&nbsp;&nbsp;着</label>

          </td>
        </tr>
      </tbody>
    </table>

	<h2 class="contentsTitle01 icoKihontouroku02 openTitle01"><span>基本登録－一般貨物 詳細</span></h2>


        <div class="ftBox mB0 w980">
            <div class="flL w950 mg0">
              <table class="tablePt01 mL20 w950">
                  <tbody>
                    <tr>
                      <th class="w130 taC">荷量</th>
                      <td class="w250">
                        <input type="text" class="w240" value="">
                      </td>
                      <td class="w30"  style="background-color:#FFFFFF">
                            ㎥
                      </td>
                      <th class="w180 taC">トン</th>
            
                      <td class="w280"><input type="text" class="w240" value=""></td>
                    <td class="w20"  style="background-color:#FFFFFF">
                    </td>
                    </tr>
                  </tbody>
              </table>
    
            </div>
            <div class="flR w20 pT10">
            	t
            </div>
        </div>
        
        <div class="w930 ftBox mL20">
            <div class="w150 flL">&nbsp;</div>
            <div class="w520 flL taL">(例)111.11</div>
            <div class="w260 flR taL">(例)11.1</div>
        </div>

        <table class="tablePt01 mL20 w970">
          <tbody>
            <tr>
              <th class="w130 taC">t車</th>
              <td class="w300">
              <select class="w280" name="example3">
                <option value="XXXXXXXX"></option>
              </select>
              </td>
              <th class="w120 taC">車両タイプ</th>
              <td class="w300 taC">
                <select class="w240" name="example4">
                  <option value="XXXXXXXX"></option>
                </select>
              </td>
              <td class="w20">&nbsp;</td>
            </tr>
            <tr>
              <th class="taC">受注金額</th>
              <td>
                <select class="w280" name="example">
                <option value="XXXXXXXX"></option>
                </select>
               
              </td>
              <td colspan="2">
                <select class="w280" name="example">
                <option value="XXXXXXXX">外税</option>
                </select>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <th class="taC">仕入金額</th>
              <td colspan="3">
          		 <input type="text" class="w240" value="">
                 <input type="text" class="w240" value="">
                 <input type="text" class="w240" value="">
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <th class="taC">実績収集区分</th>
              <td>&nbsp;</td>
              <th class="taC">実績集計件数</th>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <th class="taC">小鳩BOX</th>
              <td>&nbsp;</td>
              <td>
                <input type="submit" value="料金反映" class="w140 mL10" />
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <hr class="mT20 mB20">
    

    <table class="tablePt01 mL20 w970">
      <tbody>
        <tr>
          <th class="w110 taC">通信欄</th>
          <td class="w340">
                <textarea name="" cols=60 rows=4 class="w100per" >
                テキストエリア
                </textarea>
          </td>
          <th class="w160 taC">特記事項</th>
          <td class="w340">
                <textarea name="" cols=60 rows=4 class="w100per" >
                テキストエリア
                </textarea>
          </td>
        </tr>
        <tr>
          <th class="w110 taC">作業Memo</th>
          <td class="w340">
                <textarea name="" cols=60 rows=4 class="w100per" >
                テキストエリア
                </textarea>
          </td>
          
          <td class="w340"  colspan="2">
				
          </td>
        </tr>
      </tbody>
    </table>
    </section>
</section>
<!-- /mainContents -->
