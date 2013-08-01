<?php include('../access.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/php; charset=UTF-8">
<title>TangLab--三共振实验</title>                  

<meta charset="utf-8">
<meta name="description" content="Handcrafted pixels and text by Dan Cederholm.">
<meta name="author" content="weibo" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<link rel="shortcut icon" type="image/ico" href="../../img/icon.png"> <!--small icon on tag -->
<link rel="stylesheet" href="../../css/overall2.css"></link>
<link rel="stylesheet" href="../../css/math.css"></link>
<style type="text/css">
#protocol_info {
	text-align: right;
	font-size: 0.7em;
	border-bottom: 1px dotted rgba(252, 107, 53, 0.5);
	margin: 20px 0 20px 0;
}
#protocol_info span {
	text_align: right;
	margin: 2px 5px;
}
</style>
<link href="../../css/1MKCHPG-e.css" rel="stylesheet">


<script type="text/javascript" src="../../js/1MKCHPG.js"></script>
<script type="text/javascript" src="../../js/xheditor/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../../js/xheditor/xheditor-1.1.9-zh-cn.min.js"></script>
</head>

<body class="home blog">
		<div id="wrap">

			<div id="header"><!-- header: logo and navigation -->
				<div id="over">
			
				<div id="logo">
					<a href="#"><img src="../../img/logo.png" alt="nmr"></a>
				</div><!-- logo -->
				<div id="web_title">TANG BIOMOLECULAR NMR GROUP</div>
				<div id="info">
					<?php include('log_info.php'); ?>
				<div id="go">
					<form name="search_all" mathod="get" action="../search_all.php" >
                            <input type="text" id="keyword" class="text" name="keyword" value="search this site" onblur="if(!this.value) {this.value='search this site';this.style.color='#b2b2b2';}" onfocus="if(this.value=='search this site') this.value='';this.style.color='#ecd67a'">
                            <input type="button" class="submit" value="Go" onclick="var o=search_all.keyword;if(o.value!='search this site' && o.value.replace(/^\s+|\s+$/g,'')!='') search_all.submit();" >
                            </form>
				</div>
				</div><!-- end of info-->
				</div><!--end of over-->
	
				<div id="navigation">
					<ul class="group">
						<li id="home" class="active"><a href="../index.php"><strong>Home</strong></a></li>
						<li id="plasmid"><a href="../plasmid_index.php"><strong>Plasmid</strong></a></li>
						<li id="protocol"><a href="../protocol_index.php"><strong>Protocol</strong></a></li>
						<li id="reagent"><a href="../reagent_index.php"><strong>Reagent </strong></a></li>
					</ul>
				</div> <!-- navigation -->
			</div> <!-- header -->

			
              
			<div id="main" role="main">
			  <div id="aside">
			  	<ul class="list_1">
			      <li><h4>Pages</h4>
			      	<ul>
			      	<li><a href="../protocol_index.php">Home</a></li>
						<li><a href="../protocol_add.php">Add protocol</a></li>
						</ul>
			      </li>
					<li><h4>Categories</h4>
						<ul><li><a href='../protocol_more.php?subject=Biochemistry'>Biochemistry</a>(1)</li><li><a href='../protocol_more.php?subject=bioinformation'>bioinformation</a>(1)</li><li><a href='../protocol_more.php?subject=Computer application'>Computer application</a>(1)</li><li><a href='../protocol_more.php?subject=math'>math</a>(1)</li><li><a href='../protocol_more.php?subject=nmr'>nmr</a>(1)</li><li><a href='../protocol_more.php?subject=uncategorized'>uncategorized</a>(3)</li>						</ul>		
					</li>
					<li><h4>Archives</h4>
						<ul><li><a href='../protocol_more.php?subject=2011-9'>2011-9</a>(8)</li>						</ul>					
					</li>
					<li><h4>Links</h4>
						<ul>
							<li><a href="http://www.tanglab.org" target="_blank">www.tanglab.org</a></li>
							<li><a href="http://www.wipm.cas.cn" target="_blank">www.wipm.cas.cn</a></li>
						</ul>					
					</li>
					</ul>
		     </div>
			  <!-- aside  -->
			  <div id="content">
			    <header>
			      <h2><a href="#">三共振实验</a></h2>
		        </header>
		        <div id="protocol_id" style="display:none">8</div>
		        <div id="protocol_info">
		        <span>[<a href="../protocol_edit.php?id=8">Edit</a>]</span>
		        <span>[<a href="../protocol_history.php?id=8">History</a>]</span>
		        <span>[<a href="../protocol_discussion.php?id=8">Discussion</a>]</span>
		        </div>
		        <div id="new_protocol">
		         			 		        <style type="text/css"><!--  		@page { margin: 0.79in }  		P { margin-bottom: 0.08in }  	--></style><h3>核磁信号相干传递：</h3><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">三维，四维三共振实验对于大蛋白质的核磁研究具有特别的意义，因为这些实验提供了蛋白质主链以及部分侧链原子的明确无误的谱峰证认手段。</span></p><p style="margin-bottom: 0in" align="LEFT"><sup>13</sup>C<span style="font-family:DejaVu Sans;">，</span><sup>15</sup>N<span style="font-family:DejaVu Sans;">双标记蛋白质的异核三共振谱利用单键和两键</span>J<span style="font-family:DejaVu Sans;">偶合建立主链原子和部分侧链原子间的关联，既可提供残基内的，也可提供相邻残基的</span><sup>1</sup>H<sup>N</sup>,<sup>15</sup>N,<sup>1</sup>H<sup>α</sup>,<sup>13</sup>C<sup>α</sup>,<sup>13</sup>CO<span style="font-family:DejaVu Sans;">等原子间的关联信息，即完成序列证认，由于主要信息来自</span>J<span style="font-family:DejaVu Sans;">偶合，在结构计算前即可完成大部分，至少主链部分的所有原子的谱峰证认。既提高证认的可靠性，又加快证认的速度。而且从获得的主链原子的化学位移还可判定残基的类型以及所处的二级结构类型。</span></p><p style="margin-bottom: 0in" align="LEFT"><br /></p><h3 style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">三共振实验的命名方式：</span></h3><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">在间接维或采样维标记的自旋用</span>HN<span style="font-family:DejaVu Sans;">，</span>N<span style="font-family:DejaVu Sans;">，</span>HA<span style="font-family:DejaVu Sans;">，</span>CA<span style="font-family:DejaVu Sans;">，</span>CO<span style="font-family:DejaVu Sans;">，</span>HB<span style="font-family:DejaVu Sans;">，</span>CB<span style="font-family:DejaVu Sans;">等表示，分别代表</span><sup>1</sup>H<sup>N</sup>,<sup>15</sup>N,<sup>1</sup>H<sup>α</sup>,<sup>13</sup>C<sup>α</sup>,<sup>13</sup>CO,<sup>1</sup>H<sup>β</sup>,<sup>13</sup>C<sup>β</sup><span style="font-family:DejaVu Sans;">，不会引起误解时还可进一步简化；信号传递过程中经过并起重要作用，但没有频率标记的自旋用类似符号，但放在括号内以示区别。</span></p><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">例：</span></p><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">一个三共振实验利用下列相干传递：</span></p><table class="num_eqn " cellpadding="0" cellspacing="0">    <tbody>               <tr>        <td><sup>1</sup><em>H</em><sup>N</sup> → <sup>15</sup><em>N</em>(<em>t</em><sub>1</sub>) → <sup>13</sup><em>CO</em> → <sup>13</sup><em>C<sup>α</sup></em>(<em>t</em><sub>2</sub>) → <sup>13</sup><em>CO</em> → <sup>15</sup><em>N</em> → <sup>1</sup><em>H<sup>N</sup></em>(<em>t</em><sub>3</sub>)</td>           </tr></tbody></table><p><style type="text/css"><!--  		@page { margin: 0.79in }  		P { margin-bottom: 0.08in }  	--></style></p><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">按照上述可以称为</span>(HN)N(CO)CA(CO)(N)NH<span style="font-family:DejaVu Sans;">实验，这个实验属于”</span>outandback”<span style="font-family:DejaVu Sans;">类型，有相当一部分三共振实验属于此类型<em>(注：还有是一个方向的，如CBCA（CO）NH）</em>，由于事实上这类实验激发与检测均是</span><sup>1</sup>H<span style="font-family:DejaVu Sans;">核，因此可以将回传部分略去而不会导致误解，即省略成</span>(HN)N(CO)CA<span style="font-family:DejaVu Sans;">，由于同</span>N<span style="font-family:DejaVu Sans;">相连的</span><sup>1</sup>H<span style="font-family:DejaVu Sans;">只能是</span>HN<span style="font-family:DejaVu Sans;">，所以可以简化成</span>(H)<span style="font-family:DejaVu Sans;">，而最后检测的正是这个</span>H<span style="font-family:DejaVu Sans;">，故实际上用的名称为</span>HN(CO)CA</p><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">当然这个名称也可用于描述下列相干传递：</span></p><table class="num_eqn " cellpadding="0" cellspacing="0">    <tbody>               <tr>        <td><sup>1</sup><em>H</em><sup>N</sup> → <sup>15</sup><em>N</em> → <sup>13</sup><em>CO</em> → <sup>13</sup><em>C<sup>α</sup></em>(<em>t</em><sub>1</sub>) → <sup>13</sup><em>CO</em> → <sup>15</sup><em>N</em>(<em>t</em><sub>2</sub>) → <sup>1</sup><em>H<sup>N</sup></em>(<em>t</em><sub>3</sub>)</td>           </tr></tbody></table>  		        		 		        		 <p><style type="text/css"><!--  		@page { margin: 0.79in }  		P { margin-bottom: 0.08in }  	--></style></p><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">实际上这两个实验提供的信息一样，同一个实验可以有不同的实现方案。</span></p><p style="margin-bottom: 0in;" align="LEFT"><span style="font-family:DejaVu Sans;">下面列出主要的几种三共振实验及其提供的信息<em>（注：这些实验都是成对的，分别观察前一个，自己或后一个。如HNCA和HN（CO）CA，CBCA（CO）NH和CBCANH，HNCA和HN（CA）CO）</em>：</span></p><table><tbody><tr><td><p style="margin-bottom: 0in;" align="LEFT"><span style="font-family:DejaVu Sans;"><img src="images/day_110926/201109261149008551.jpg" alt="" height="118" width="353" /></span></p></td><td><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;"><img src="images/day_110926/201109261526549932.jpg" alt="" height="118" width="353" /><br /></span></p></td></tr>        <tr><td><img src="images/day_110926/201109261532325601.jpg" alt="" height="118" width="353" /></td><td><img src="images/day_110926/201109261533198447.jpg" alt="" height="118" width="353" /></td></tr>                 <tr><td><img src="images/day_110926/201109261533372742.jpg" alt="" height="118" width="353" /></td><td><img src="images/day_110926/201109261533565147.jpg" alt="" height="118" width="353" /></td></tr>                 <tr><td><img src="images/day_110926/201109261534158057.jpg" alt="" height="118" width="353" /></td><td><img src="images/day_110926/201109261534395569.jpg" alt="" height="118" width="353" /></td></tr>                 <tr><td><img src="images/day_110926/201109261535151524.jpg" alt="" height="118" width="353" /></td><td><img src="images/day_110926/201109261535381336.jpg" alt="" height="118" width="353" /></td></tr>                 <tr><td><img src="images/day_110926/201109261535522553.jpg" alt="" height="118" width="353" /></td><td><img src="images/day_110926/201109261536041219.jpg" alt="" height="118" width="353" /></td></tr>                 <tr><td><img src="images/day_110926/201109261536226124.jpg" alt="" height="118" width="353" /></td><td>&nbsp;</td></tr></tbody></table><style type="text/css"><!--  		@page { margin: 0.79in }  		P { margin-bottom: 0.08in }  	--></style><p style="margin-bottom: 0in;" align="LEFT"><span style="font-family:DejaVu Sans;">&nbsp;&nbsp;&nbsp; 在三共振实验中涉及的</span>J<span style="font-family:DejaVu Sans;">偶合常数：</span></p><p><sup>1</sup><em><strong>J</strong></em><sub> NH</sub>≈91 Hz, &nbsp; <sup>1</sup><em><strong>J</strong></em><sub> NC<sup>α</sup></sub>≈7-11Hz, &nbsp; <sup>2</sup><em><strong>J</strong></em><sub> NC<sup>α</sup></sub>≈4-9Hz,&nbsp; <sup>1</sup><em><strong>J</strong></em><sub> NCO</sub>≈15Hz,&nbsp;   <sup>1</sup><em><strong>J</strong></em><sub> C<sup>α</sup>CO</sub>≈55Hz,&nbsp; <sup>1</sup><em><strong>J</strong></em><sub> CH</sub>≈140 Hz(aliphatic),&nbsp;	<sup>1</sup><em><strong>J</strong></em><sub> CH</sub>≈160 Hz(aromatic),&nbsp;  <sup>1</sup><em><strong>J</strong></em><sub> C<sup>α</sup>C<sup>β</sup></sub>≈35Hz</p><p><em>注：Transfer coherence所需的时间是1/2J，所以J越小，transfer时间越长，效率越低</em><br /></p><p><style type="text/css"><!--  		@page { margin: 0.79in }  		P { margin-bottom: 0.08in }  	--></style></p><h3 style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">实验步骤：</span></h3><p style="margin-bottom: 0in" align="LEFT">1<span style="font-family:DejaVu Sans;">：准备样品，确认探头为三共振探头<em>(注：这一步对所有实验都适用）</em></span></p><p style="margin-bottom: 0in" align="LEFT">2<span style="font-family:DejaVu Sans;">：</span>ej<span style="font-family:DejaVu Sans;">弹出上一次实验的样品，放入三共振样品，待采样指示灯变黄后，</span>edte<span style="font-family:DejaVu Sans;">调节温度。</span></p><p style="margin-bottom: 0in" align="LEFT">3<span style="font-family:DejaVu Sans;">：</span>edc<span style="font-family:DejaVu Sans;">一个方法，到新的文件夹。待温度稳定后，</span>lockdisp10%D<sub>2</sub>O+90%H<sub>2</sub>O<span style="font-family:DejaVu Sans;">锁场；</span></p><p style="margin-bottom: 0in" align="LEFT">4<span style="font-family:DejaVu Sans;">：</span>atmm<span style="font-family:DejaVu Sans;">调谐，三个通道都需要调谐。</span>Match<span style="font-family:DejaVu Sans;">，峰值最低，</span>tune<span style="font-family:DejaVu Sans;">对称性。</span></p><p style="margin-bottom: 0in" align="LEFT">5<span style="font-family:DejaVu Sans;">：</span>topshimgui<span style="font-family:DejaVu Sans;">匀场（</span>finalB0&lt;0.2<span style="font-family:DejaVu Sans;">）</span></p><p style="margin-bottom: 0in" align="LEFT">6<span style="font-family:DejaVu Sans;">：打开一个</span>zg<span style="font-family:DejaVu Sans;">脉冲序列，</span>p1=0.2<span style="font-family:DejaVu Sans;">。</span>zgefp<span style="font-family:DejaVu Sans;">，测试水中心，记下数值。</span></p><p style="margin-bottom: 0in" align="LEFT">7<span style="font-family:DejaVu Sans;">：</span>p1=40<span style="font-family:DejaVu Sans;">，</span>gs<span style="font-family:DejaVu Sans;">调节</span>p1<span style="font-family:DejaVu Sans;">至</span>area<span style="font-family:DejaVu Sans;">值最小时即可，此时的</span>p1<span style="font-family:DejaVu Sans;">为</span>360<span style="font-family:DejaVu Sans;">脉宽，算出</span>90°p1<span style="font-family:DejaVu Sans;">值。<em>(注：p1值主要由buffer中的盐浓度所决定）</em></span></p><p style="margin-bottom: 0in;" align="LEFT">8<span style="font-family:DejaVu Sans;">：打开准备做三共振实验的实验方法，点击</span>AcquPars<span style="font-family:DejaVu Sans;">，出现如下对话框</span></p><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;"><img src="images/day_110926/201109261554556219.jpg" alt="" height="411" width="674" /><br /></span></p><style type="text/css"><!--  		@page { margin: 0.79in }  		P { margin-bottom: 0.08in }  	--></style><p style="margin-bottom: 0in" align="LEFT">9<span style="font-family:DejaVu Sans;">：点击</span>PULPROG<span style="font-family:DejaVu Sans;">的…选择要做的实验的脉冲序列，如</span>b_hncagp3d<span style="font-family:DejaVu Sans;">，载入序列后，</span></p><p style="margin-bottom: 0in" align="LEFT">   rpar B_HNCAGP3D<span style="font-family:DejaVu Sans;">，随即读入脉冲序列常规的参数。<em>（注：B指best，所有的1H脉冲都是shape pulse，这样d1就能设的短）</em></span></p><p style="margin-left: 0.29in; text-indent: -0.29in; margin-bottom: 0in" align="LEFT">10<span style="font-family:DejaVu Sans;">：输入</span>6 <span style="font-family:DejaVu Sans;">、</span>7<span style="font-family:DejaVu Sans;">中所测得的值</span>o1p=<span style="font-family:DejaVu Sans;">？</span>p1=?<span style="font-family:DejaVu Sans;">根据之前采的</span>HSQC<span style="font-family:DejaVu Sans;">，可以判断</span>N<span style="font-family:DejaVu Sans;">维的谱宽（<em>注：谱宽的优化应在HSQC中进行，越窄怎则在相同时间内的分辨率越高）</em>，</span>sw<span style="font-family:DejaVu Sans;">以及</span>N<span style="font-family:DejaVu Sans;">维中心频率；既是</span>O2Pca<span style="font-family:DejaVu Sans;">约为</span>53.3<span style="font-family:DejaVu Sans;">（</span>注：bruker800<span style="font-family:DejaVu Sans;">上</span>c<span style="font-family:DejaVu Sans;">维谱宽</span>53.3<span style="font-family:DejaVu Sans;">相当于</span>56<span style="font-family:DejaVu Sans;">，所有Bruker仪器13C都有2.7ppm的off），</span>C=O<span style="font-family:DejaVu Sans;">约为</span>176<span style="font-family:DejaVu Sans;">，所以可设成</span>173.3</p><p style="margin-left: 0.29in; text-indent: -0.29in; margin-bottom: 0in" align="LEFT">11<span style="font-family:DejaVu Sans;">：如果之前没有做过</span>C-H<span style="font-family:DejaVu Sans;">的</span>hsqc<span style="font-family:DejaVu Sans;">或也没有别人的相同蛋白</span>C<span style="font-family:DejaVu Sans;">维谱宽的参考值，可先采一个短的</span>1H-13C<span style="font-family:DejaVu Sans;">的</span>HSQC<span style="font-family:DejaVu Sans;">，先将其谱宽设成</span>32<span style="font-family:DejaVu Sans;">（</span>ca<span style="font-family:Symbol, serif;">±</span>16<span style="font-family:DejaVu Sans;">），</span>16<span style="font-family:DejaVu Sans;">（</span>C=O<span style="font-family:DejaVu Sans;">，±</span>8<span style="font-family:DejaVu Sans;">）</span></p><p style="margin-left: 0.29in; text-indent: -0.29in; margin-bottom: 0in" align="LEFT">    <span style="font-family:DejaVu Sans;">（之所以这样设置参数，是因为</span>ca<span style="font-family:DejaVu Sans;">最大值</span>68<span style="font-family:DejaVu Sans;">左右，最小值</span>44<span style="font-family:DejaVu Sans;">左右，因而</span>32<span style="font-family:DejaVu Sans;">可以覆盖所有</span>ca<span style="font-family:DejaVu Sans;">的值，</span>C=O 16<span style="font-family:DejaVu Sans;">也是同样道理）</span>,<span style="font-family:DejaVu Sans;">根据</span>HSQC<span style="font-family:DejaVu Sans;">的值得到</span>c<span style="font-family:DejaVu Sans;">维中心及谱宽。</span></p><p style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT">12<span style="font-family:DejaVu Sans;">： </span>CNST19 H-N offset<span style="font-family:DejaVu Sans;">的值设置为蛋白在</span>H-NHSQC<span style="font-family:DejaVu Sans;">上水峰左边谱峰中心位置的值（不</span>o1p<span style="font-family:DejaVu Sans;">），</span>8ppm<span style="font-family:DejaVu Sans;">左右</span></p><p style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT">13<span style="font-family:DejaVu Sans;">：点击</span>PulseProg<span style="font-family:DejaVu Sans;">，进入如下对话框    </span></p><p><img src="images/day_110926/201109261558467796.jpg" alt="" height="594" width="674" /></p><style type="text/css"><!--  		@page { margin: 0.79in }  		P { margin-bottom: 0.08in }  	--></style><p style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">记下各个</span>shape pulse<span style="font-family:DejaVu Sans;">，如</span>sp25 f1 90 degree  Pc9_4_90.1000 - p41 f1 90 degree  3.0ms at 600MHZ<span style="font-family:DejaVu Sans;">等</span>(<span style="font-family:DejaVu Sans;">换算方法既是脉宽与谱仪的赫兹数成反比的关系</span>)<span style="font-family:DejaVu Sans;">，在</span>800MHz<span style="font-family:DejaVu Sans;">上就是</span>2.25ms<span style="font-family:DejaVu Sans;">，依次类推。</span></p><p style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT">14<span style="font-family:DejaVu Sans;">：记下后回到</span>AcquPars<span style="font-family:DejaVu Sans;">目录下，点击采样参数，输入</span>edprosol<span style="font-family:DejaVu Sans;">，按照记下的数据，求出各个形状脉冲对应的功率。具体算法如下<span style="font-size:13px;"></span>，在</span>edprosol<span style="font-family:DejaVu Sans;">弹出的对话框里，</span>standardpulse<span style="font-family:DejaVu Sans;">里，选中</span>shapepulse<span style="font-family:DejaVu Sans;">对应作用的核，再输入相应的参数，如</span>H p1=?  Pl1=<span style="font-family:DejaVu Sans;">？（氢维数值可以算得，</span>N,C<span style="font-family:DejaVu Sans;">维数值可以用管理人员校正的值）。输入后点击</span>shapepulse <span style="font-family:DejaVu Sans;">，输入</span>shape pulse<span style="font-family:DejaVu Sans;">对应的脉宽，以及选中</span>shapepulse <span style="font-family:DejaVu Sans;">的名称，点击</span>calculate<span style="font-family:DejaVu Sans;">即可计算出对应的</span>shapepulse <span style="font-family:DejaVu Sans;">的功率的值。</span></p><p style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT">15<span style="font-family:DejaVu Sans;">：采样次数，点数，</span>d1<span style="font-family:DejaVu Sans;">等值根据蛋白的性质以及时间的允许情况自己设定<span style="font-size:13px;"></span>。</span></p><p style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT">16<span style="font-family:DejaVu Sans;">：设置好所有参数后，</span>topshimgui <span style="font-family:DejaVu Sans;">再次匀场，</span>rga<span style="font-family:DejaVu Sans;">，给一个低于</span>rga<span style="font-family:DejaVu Sans;">算出后的</span>rg<span style="font-family:DejaVu Sans;">值。</span></p><p style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT">    <span style="font-family:DejaVu Sans;">设置好之后，</span>zg<span style="font-family:DejaVu Sans;">即可<span style="font-size:13px;"></span>。</span></p><p style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT"><br /></p><h3 style="margin-left: 0.44in; text-indent: -0.44in; margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">需要注意的几点：</span></h3><ol><li><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">每一个三共振实验的前后最好都有一个</span>HSQC<span style="font-family:DejaVu Sans;">，作为观察蛋白样品是否完好的标准，如果蛋白降解或聚集，即可立即停掉实验<span style="font-size:13px;"></span>。</span></p></li><li><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">由于三共振实验时间都较长，所以设完实验后，要定期去观察实验的运行情况，在溢出，掉场之类的情况发生后能迅速解决<span style="font-size:13px;"></span>。</span></p></li><li><p style="margin-bottom: 0in" align="LEFT"><span style="font-family:DejaVu Sans;">当使用</span>multizg<span style="font-family:DejaVu Sans;">来运行多个三共振实验时，开始之前先需要每一个三共振实验都</span>zg<span style="font-family:DejaVu Sans;">一次，比对一下一维氢谱以及看能不能正常运行，因为多个实验一起设时，很容易忘掉或者算错某个形状脉冲，或者弄错某个参数<span style="font-size:13px;"></span>。</span></p></li></ol> 		        		 		        		 		        		 		        		 		        		 		        		 		        		 		        		 		        		 		        		 		        		
		        </div>
			  </div>
			  <!-- content -->
		  </div>
			<!-- main -->
			
	</div> <!--wrap -->
		

<div id="footer">
		<p>Biomolecular NMR Group, WIPM, CAS © 2010</p>
		<p id="footer-logo"><a href="#"><img src="../../img/logo_black.png" alt="nmr"></a></p>
	</div>



<!-- c(~) -->

</body>
</html>
