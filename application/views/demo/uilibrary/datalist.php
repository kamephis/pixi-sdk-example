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
<br />
<hr />
<div class="col-sm12">
    <p>With the <code class="highlight">pixi* UI - Library</code> you can generate a simple datalist. It looks a lot like a table, but is rendered differently in the view.
    The following example will show you how to generate a datalist like the one shown above.</p>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="highlight">
            <pre>
                <code>
&lt;?php

<span class="o">// Including library classes</span>
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">DataList</span>\<span class="g">DataList</span>;

<span class="db">class</span> <span class="g">Uilibrary</span> <span class="db">extends</span> <span class="g">SDKMenu</span>
{
    <span class="db">public function</span> <span class="g">__construct</span>()
    {
        <span class="g">parent</span>::<span class="lb">__construct</span>();
    }
    
    <span class="db">public function</span> <span class="g">datalist</span>()
    {     
        <span class="o">// Prepared data for demo</span>
        <span class="lb">$data</span> = <span class="db">array</span>(<span class="r">'country'</span> => <span class="r">'Germany'</span>, <span class="r">'population'</span> => <span class="db">81890000</span>);
        
        <span class="lb">$el</span> = <span class="db">new</span> <span class="g">DataList</span>(<span class="r">'Countries and population'</span>);
        <span class="lb">$el</span>-><span class="lb">addElement</span>(<span class="r">'country'</span>, <span class="r">DataFormat::FORMAT_STRING</span>, <span class="r">'Country'</span>);
        <span class="lb">$el</span>-><span class="lb">addElement</span>(<span class="r">'population'</span>, <span class="r">DataFormat::FORMAT_STRING</span>, <span class="r">'Population'</span>, <span class="r">'number'</span>);
        
        <span class="o">// Fill DataList with values</span>
        <span class="lb">$el</span>-><span class="lb">addValues</span>(<span class="lb">$data</span>);
        
        <span class="lb">$this</span>-><span class="lb">loadMainView</span>(<span class="r">'UI Library - Datalist'</span>, <span class="r">'Rapid development with less code'</span>, <span class="db">array</span>(<span class="lb">$el</span>));
    }
}
                </code>
            </pre>
        </div>
    </div>
</div>
