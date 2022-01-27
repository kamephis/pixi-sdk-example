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
<hr />
<div class="col-sm12">
    <p>And here's how it's done:</p>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="highlight">
            <pre>
                <code>
&lt;?php

<span class="o">// Including library classes</span>
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Form</span>\<span class="g">Form</span>;
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Form</span>\<span class="g">FormElement</span>;

<span class="db">class</span> <span class="g">Form</span> <span class="db">extends</span> <span class="g">SDKMenu</span>
{
    <span class="db">public function</span> <span class="g">__construct</span>()
    {
        <span class="db">parent</span>::<span class="g">__construct</span>();
    }
    
    <span class="db">public function</span> <span class="g">index</span>()
    {     
        <span class="lb">$form</span> = <span class="db">new</span> <span class="g">Form</span>(<span class="r">'form/index'</span>);
        <span class="lb">$form</span>-><span class="lb">addElement</span>(<span class="r">'name'</span>, <span class="g">FormElement</span>::<span class="lb">ElementTypeString</span>, <span class="r">'Name:'</span>);
        <span class="lb">$form</span>-><span class="lb">addElement</span>(<span class="r">'age'</span>, <span class="g">FormElement</span>::<span class="lb">ElementTypeNumber</span>, <span class="r">'Age:'</span>);
        <span class="lb">$form</span>-><span class="lb">addElement</span>(<span class="r">'readonly'</span>, <span class="g">FormElement</span>::<span class="lb">ElementTypeReadOnly</span>, <span class="r">'I am readonly:'</span>, <span class="r">'This value can\'t be changed'</span>);
        <span class="lb">$form</span>-><span class="lb">addElement</span>(<span class="r">'password'</span>, <span class="g">FormElement</span>::<span class="lb">ElementTypePassword</span>, <span class="r">'Password:'</span>, <span class="r">'password'</span>);
        
        <span class="lb">$this</span>-><span class="lb">loadMainView</span>(<span class="r">'UI Library - Forms'</span>, <span class="r">'Simple forms without a single line of html'</span>, <span class="lb">$form</span>);
    }
}
                </code>
            </pre>
        </div>
    </div>
</div>
