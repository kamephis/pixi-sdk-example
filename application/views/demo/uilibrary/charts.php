<!-- PAGE CONTENT BEGINS -->
<style>
.db {
    color: #069;
}

.lb {
    color: #4f9fcf;
}

.g {
    color: #0A8
}

.r {
    color: #c7254e
}

.o {
    color: #f2a91c;
}

code.highlight {
    padding:2px 4px;
    font-size:90%;
    color:#c7254e;
    background-color:#f9f2f4;
    border-radius:4px
}
</style>
<div class="col-sm12">
    <p>With the <code class="highlight">pixi* UI - Library</code> simple charts can be generated as easy as tables. It basically uses the same classes, but renders them in a different way.<br/>
    The following example will show you how to generate a chart like the one shown below.</p>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="highlight">
            <pre>
                <code>
&lt;?php

<span class="o">// Including library classes</span>
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Table</span>\<span class="g">Table</span>;
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Data</span>\<span class="g">DataFormat</span>;
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Chart</span>\<span class="g">Chart</span>;

<span class="db">class</span> <span class="g">Uilibrary</span> <span class="db">extends</span> <span class="g">SDKMenu</span>
{
    <span class="db">public function</span> <span class="g">__construct</span>()
    {
        <span class="g">parent</span>::<span class="lb">__construct</span>();
    }
    
    <span class="db">public function</span> <span class="g">charts</span>()
    {     
        <span class="o">// Prepared data for demo</span>
        <span class="lb">$data</span> = <span class="db">array</span>(
            <span class="db">array</span>(<span class="r">'country'</span> => <span class="r">'Germany'</span>, <span class="r">'population'</span> => <span class="db">81890000</span>),
            <span class="db">array</span>(<span class="r">'country'</span> => <span class="r">'Slovenia'</span>, <span class="r">'population'</span> => <span class="db">2000000</span>),
            <span class="db">array</span>(<span class="r">'country'</span> => <span class="r">'Austria'</span>, <span class="r">'population'</span> => <span class="db">8460000</span>)
        );
        
        <span class="o">/**
         * Create chart object and define its structure.
         * 
         * The chart class is an extended version of the table class and 
         * therefor uses the same methods. The main difference is at the
         * rendering part at the end, which you don't have to take care
         * about.
         */</span>
        <span class="lb">$chart</span> = <span class="db">new</span> <span class="g">Chart</span>(<span class="r">'Statistics'</span>);
        <span class="lb">$chart</span>-><span class="lb">addColumn</span>(<span class="r">'country'</span>, <span class="r">'Country'</span>);
        <span class="lb">$chart</span>-><span class="lb">addColumn</span>(<span class="r">'population'</span>, <span class="r">'Population'</span>, <span class="r">'number'</span>);
        
        <span class="o">// Adding data to chart</span>
        <span class="lb">$chart</span>-><span class="lb">addRows</span>(<span class="lb">$data</span>);
        
        <span class="lb">$this</span>-><span class="lb">loadMainView</span>(<span class="r">'UI Library - Charts'</span>, <span class="r">'Rapid development with less code'</span>, <span class="db">array</span>(<span class="lb">$chart</span>));
    }
}
                </code>
            </pre>
        </div>
    </div>
</div>
<hr />
<div class="col-sm12">
    <h3>Scan the sources</h3>
    <p>Below you see the code in action! Feel free to check out our project on Bitbucket for a more detailed description and the source code.<br />
    <a href="https://bitbucket.org/pixi_software/pixi-sdk-ui/wiki/Home" target="_blank">(Check it our for more details <i class="ace-icon fa fa-external-link"></i>)</a></p>
</div>
<hr />
