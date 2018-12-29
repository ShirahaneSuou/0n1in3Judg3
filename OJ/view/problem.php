<!DOCTYPE html>
<html>
    <head>
        <?php require_once("./view/components/header.php");?>
        <title><?php echo " - {$OJ_NAME}";?></title>
    </head> 
    <body>
        <?php require("./view/components/navbar.php"); ?>

        <div class="container">

            <div class="main">
              <script>
                var Context = {"problemId":1001,"socketUrl":"/p/1001/pretest-conn","postPretestUrl":"/p/1001/pretest","postSubmitUrl":"/p/1001/submit","getSubmissionsUrl":"/p/1001/submit","getRecordDetailUrl":"/records/%7Brid%7D","code_lang":"cc","code_template":"#include <iostream>\n\nusing namespace std;\n\nint main()\n{\n    cout << \"hello, world\" << endl;\n}"};
              </script>
              <div class="row">
                <div class="col col-md-9 medium-9 columns">
                  <div class="section visible">
                    <div class="problem-content-container"><div class="problem-content" data-marker-enabled="">
                      <div class="section__header non-scratchpad--hide">
                        <h1>谁拿了最多奖学金</h1>
                      </div>
                
                      <div class="section__body typo">
<h1><a data-toggle="collapse" data-target="#problemDesc">描述</a></h1>
<div class="collapse show in" id="problemDesc" aria-expanded="true">
    <pre><?php echo $problemInfo["description"];?></pre>
                        <p>某校的惯例是在每学期的期末考试之后发放奖学金。发放的奖学金共有五种，获取的条件各自不同：</p>

                        <p>1)  院士奖学金，每人8000元，期末平均成绩高于80分（&gt;80），并且在本学期内发表1篇或1篇以上论文的学生均可获得；</p>

                        <p>2)  五四奖学金，每人4000元，期末平均成绩高于85分（&gt;85），并且班级评议成绩高于80分（&gt;80）的学生均可获得；</p>

                        <p>3)  成绩优秀奖，每人2000元，期末平均成绩高于90分（&gt;90）的学生均可获得；</p>

                        <p>4)  西部奖学金，每人1000元，期末平均成绩高于85分（&gt;85）的西部省份学生均可获得；</p>

                        <p>5)  班级贡献奖，每人850元，班级评议成绩高于80分（&gt;80）的学生干部均可获得；</p>

                        <p>只要符合条件就可以得奖，每项奖学金的获奖人数没有限制，每名学生也可以同时获得多项奖学金。例如姚林的期末平均成绩是87分，班级评议成绩82分，同时他还是一位学生干部，那么他可以同时获得五四奖学金和班级贡献奖，奖金总数是4850元。</p>

                        <p>现在给出若干学生的相关数据，请计算哪些同学获得的奖金总数最高（假设总有同学能满足获得奖学金的条件）。</p>
</div>
<a data-toggle="collapse" data-target="#DataFormat"><h1>格式</h1></a>
<div class="collapse show in" id="DataFormat" aria-expanded="true">
                        <a data-toggle="collapse" data-target="#problemInput"><h2>输入格式</h2></a>
                        <div class="collapse show in" id="problemInput" aria-expanded="true">
                            <pre><?php echo $problemInfo['input'];?></pre>
                            <p>输入的第一行是一个整数N（1 &lt;= N &lt;= 100），表示学生的总数。接下来的N行每行是一位学生的数据，从左向右依次是姓名，期末平均成绩，班级评议成绩，是否是学生干部，是否是西部省份学生，以及发表的论文数。姓名是由大小写英文字母组成的长度不超过20的字符串（不含空格）；期末平均成绩和班级评议成绩都是0到100之间的整数（包括0和100）；是否是学生干部和是否是西部省份学生分别用一个字符表示，Y表示是，N表示不是；发表的论文数是0到10的整数（包括0和10）。每两个相邻数据项之间用一个空格分隔。</p>
                        </div>

                        <a data-toggle="collapse" data-target="#problemOutput"><h2>输出格式</h2></a>
                        <div class="collapse show in" id="problemOutput" aria-expanded="true">
                            <pre><?php echo $problemInfo['output'];?></pre>
                            <p>输出包括三行，第一行是获得最多奖金的学生的姓名，第二行是这名学生获得的奖金总数。如果有两位或两位以上的学生获得的奖金最多，输出他们之中在输入文件中出现最早的学生的姓名。第三行是这N个学生获得的奖学金的总数。</p>
                        </div>
</div>
<a data-toggle="collapse" data-target="#SimpleData"><h1>样例1</h1></a>
<div class="collapse show in" id="SimpleData" aria-expanded="true">
                    <a data-toggle="collapse" data-target="#dataIn">
                        <h2>样例输入1</h2>
                    </a>
                    <div class="collapse show in" id="dataIn" aria-expanded="true">
                        <div class="zero-clipboard">
                            <span id="bl-p-copy" class="btn-clipboard" onclick="copyToClipboard(document.getElementById('dataInContent').innerHTML);">复制</span>
                        </div>
                        <pre class="syntax-hl line-numbers code-toolbar language-data ">
                            <code class=" highlight language-data">
<?php echo $problemInfo['sample_input'];?>

4
YaoLin 87 82 Y N 0
ChenRuiyi 88 78 N Y 1
LiXin 92 88 N N 0
ZhangQin 83 87 Y N 1<span aria-hidden="true" class="line-numbers-rows"><span></span></span>
                            </code>
                            <div class="toolbar"><div class="toolbar-item"><a href="javascript:;">Copy</a></div></div>
                        </pre>
                    </div>
                    <a data-toggle="collapse" data-target="#dataOut">
                          <h2>样例输出1</h2>
                    </a>
                    <div class="collapse show in" id="dataOut" aria-expanded="true">                    
                        <pre class="syntax-hl line-numbers code-toolbar language-data">
<code class="  language-data">
<?php echo $problemInfo['sample_output'];?>    
ChenRuiyi
9000
28700<span aria-hidden="true" class="line-numbers-rows"></span>
</code>
                        <div class="toolbar"><div class="toolbar-item"><a href="javascript:;">Copy</a></div></div>
                        </pre>
                    </div>
</div>
                            <h1>限制</h1>

                            <p>1s</p>

                            <h1>来源</h1>
                            <pre><?php echo $problemInfo['source'];?></pre>
                            <p>NOIp2005 第一题</p>

                          </div>
                        </div>
                        </div>
                      </div>
                    </div>

                   <div class="col col-auto-3 medium-3 columns ">
                      <div class="section side section--problem-sidebar visible">
                        <div>
                          <ol class="menu">
 
                            <li class="menu__item scratchpad--hide">
                              <span class="icon icon-send"></span>
                                <a id="oj-p-submit" class="btn btn-primary" href="./problemsubmit.php?pid=<?php echo $problemInfo['problem_id'];?>" role="button"><?php echo "L_SUBMIT";?></a>     
                               <!--   <a class="menu__link" href="/p/1001/submit">
                            </a> -->
                            </li> 
                            <li class="menu_itemm">
                                <a class="btn btn-primary" href="./problemstatistics.php?pid=<?php echo $problemInfo['problem_id'];?>" role="button"><?php echo "L_STATUS";?></a>

                            </li>
                            <li class="menu__seperator"></li>
                            <li class="menu__item"><a class="menu__link" href="/discuss/10/1001">
                              <span class="icon icon-comment--text"></span> Discussions
                            </a></li>
                            <li class="menu__item"><a class="menu__link" href="/p/1001/solution">
                              <span class="icon icon-comment--text"></span> Solutions
                            </a></li>
                          </ol>
                        </div>
                      </div>

                      <div class="section side visible">
                        <div class="section__header">
                            <h1 class="section__title">Information</h1>
                        </div>
                        <div class="section__body typo">
                          <dl class="large horizontal">
                            <dt>ID</dt>
                            <dd>1001</dd>
                            <dt>Submission</dt>
                            <dd>
                              <span class="icon record-status--icon pass"></span>
                              <a href="/records/58b3dc75d3d8a17783ca1aec" class="record-status--text pass">
                                Accepted
                              </a>
                            </dd>
                    <dt><?php echo "L_TIME_LIMIT";?></dt><dd><span class="label label-primary badge badge-primary"><?php echo $problemInfo['time_limit']." Sec";?></span></dd>
                    <dt><?php echo "L_MEM_LIMIT";?></dt><dd><span class="label label-primary badge badge-primary"><?php echo $problemInfo['memory_limit']." MiB";?></span></dd>
                    <dt><?php echo "L_SUBMIT";?></dt><dd><span class="label label-info badge badge-info"><?php echo $problemInfo['submit'];?></span></dd>
                    <dt><?php echo "L_JUDGE_AC";?></dt><dd><span class="label label-success badge badge-success"><?php echo $problemInfo['accepted'];?></span></dd>
                            <dt>Difficulty</dt>
                            <dd>5</dd>
                            <dt>Category</dt>
                            <dd>
                              <span class="hasjs--hide" name="problem-sidebar__categories">
                                <a href="/p/category/%E6%A8%A1%E6%8B%9F">模拟</a>
                              </span>
                              <span class="nojs--hide">
                                <a href="javascript:;" name="problem-sidebar__show-category">Click to Show</a>
                              </span>
                            </dd>
                            <dt>Tags</dt>
                            <dd>
                              <ul class="problem__tags">    <li class="problem__tag"><a class="problem__tag-link" href="/p/category/NOIP">NOIP</a></li>    <li class="problem__tag"><a class="problem__tag-link" href="/p/category/2005">2005</a></li>    <li class="problem__tag"><a class="problem__tag-link" href="/p/category/%E6%8F%90%E9%AB%98%E7%BB%84">提高组</a></li>  </ul>
                            </dd>
                            <dt># Submissions</dt>
                            <dd><a href="/records?pid=1001">31999</a></dd>
                            <dt># My Submissions</dt>
                            <dd><a href="/records?pid=1001&amp;uid_or_name=113814">1</a></dd>
                            <dt>Accepted</dt>
                            <dd>10771</dd>
                            <dt>Accepted Ratio</dt>
                            <dd>34%</dd>
                            <dt>Uploaded By</dt>
                            <dd><span class="user-profile-link">
                              <img class="small user-profile-avatar v-center" src="//cn.gravatar.com/avatar/?d=mm&amp;s=200" width="20" height="20">
                              <a class="user-profile-name" href="/user/3">
                                chp516
                              </a>
                            </span>
                          </dd>
                        </dl>
                      </div>
                    </div>

                    <div class="section side visible">
                      <div class="section__header">
                        <h1 class="section__title">Related</h1>
                      </div>
                      <div class="section__body typo">
                        <p>In following training plans: </p>
                        
                        <p><a href="/training/5bb61162d3d8a13cf3783f3e">!！！！！！！！</a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="scratchpad-container" style="display:none">
                  <div style="display:none" class="loader-container"><div class="loader"></div></div>
                  <div id="scratchpad" style="opacity:0"></div>
                </div>
              </div>



















                    
        </div>
    </body>

</html>