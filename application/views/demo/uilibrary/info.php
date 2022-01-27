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
    <p>With the <code class="highlight">pixi* UI - Library</code> you can generate simple dashboard elements for presenting various KPIs in the application.</p>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="highlight">
            <pre>
                <code>
&lt;?php

<span class="o">// Including library classes</span>
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Info</span>\<span class="g">Info</span>;
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Info</span>\<span class="g">InfoElement</span>;


<span class="db">class</span> <span class="g">Uilibrary</span> <span class="db">extends</span> <span class="g">SDKMenu</span>
{
    <span class="db">public function</span> <span class="g">__construct</span>()
    {
        <span class="g">parent</span>::<span class="lb">__construct</span>();
    }
    
    <span class="db">public function</span> <span class="g">info</span>()
    {     

        <span class="o">// Create new Info Element</span>
        <span class="lb">$el</span> = <span class="db">new</span> <span class="g">Info</span>('<span class="r">Title of the Info</span>');

        <span class="o">/// Add Info</span>
        <span class="lb">$el</span>-><span class="lb">addElement</span>(<span class="db">new</span> <span class="g">InfoElement</span>('<span class="r">Info Title</span>', '<span class="r">Subinfo title</span>', '<span class="r">fa-heart</span>', '<span class="r">green</span>', '<span class="r">optional url<span class="r">'));
        <span class="lb">$el</span>-><span class="lb">addElement</span>(<span class="db">new</span> <span class="g">InfoElement</span>('<span class="r">Info Title</span>', '<span class="r">Subinfo title</span>', '<span class="r">fa-flag</span>', '<span class="r">red</span>', '<span class="r">optional url<span class="r">'));
        <span class="lb">$el</span>-><span class="lb">addElement</span>(<span class="db">new</span> <span class="g">InfoElement</span>('<span class="r">Info Title</span>', '<span class="r">Subinfo title</span>', '<span class="r">fa-question</span>', '<span class="r">orange</span>', '<span class="r">optional url<span class="r">'));
                
        <span class="lb">$this</span>-><span class="lb">loadMainView</span>(<span class="r">'UI Library - Info'</span>, <span class="r">'Rapid development with less code'</span>, <span class="db">array</span>(<span class="lb">$el</span>));
    }
}
                </code>
            </pre>
        </div>
    </div>
</div>
<hr />
<hr />