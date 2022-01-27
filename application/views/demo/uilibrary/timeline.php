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
    <p>With the <code class="highlight">pixi* UI - Library</code> simple timeline generation made easy.</p>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="highlight">
            <pre>
                <code>
&lt;?php

<span class="o">// Including library classes</span>
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Timeline</span>\<span class="g">Timeline</span>;
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Timeline</span>\<span class="g">TimelineElement</span>;

<span class="db">class</span> <span class="g">Uilibrary</span> <span class="db">extends</span> <span class="g">SDKMenu</span>
{
    <span class="db">public function</span> <span class="g">__construct</span>()
    {
        <span class="g">parent</span>::<span class="lb">__construct</span>();
    }
    
    <span class="db">public function</span> <span class="g">timeline</span>()
    {
        <span class="o">/// Create new Timeline Element</span>
        <span class="lb">$el</span> = <span class="db">new</span> <span class="g">Timeline</span>(<span class="r">'Timeline example'</span>);

        <span class="lb">$el</span>-><span class="lb">addElement</span>(<span class="db">new</span> <span class="g">TimelineElement</span>(
                <span class="r">'First event'</span>, 
                <span class="r">'This is the description of the first element'</span>, 
                <span class="r">'2014-09-23 12:06'</span>, 
                <span class="r">null</span>, 
                <span class="r">'fa-asterisk'</span>,
                <span class="r">null</span>,
                <span class="r">'primary'</span> 
        ));

        <span class="lb">$el</span>-><span class="lb">addElement</span>(<span class="db">new</span> <span class="g">TimelineElement</span>(
                <span class="r">'Second event'</span>, 
                <span class="r">'This is the description of the second element'</span>, 
                <span class="r">'2014-09-23 16:06'</span>, 
                <span class="r">null</span>, 
                <span class="r">'fa-music'</span>,
                <span class="r">'http://www.music.com'</span>,
                <span class="r">'danger'</span>
        ));
        
        <span class="o">/**
         * addElement seventh argument $Color 
         * is not typical color element which accept color palate by string name
         * colors are coming from ace btn element http://localhost/pixiSDK/index.php/demo/uielements/buttons
         * possible colors are: default, primary, info, success, pink, warning, danger, inverse, purple, yellow, grey, light ...
         */</span>
        
        <span class="lb">$this</span>-><span class="lb">loadMainView</span>(<span class="r">'UI Library - Timeline'</span>, <span class="r">'Rapid development with less code'</span>, <span class="db">array</span>(<span class="lb">$el</span>));
    }
}
                </code>
            </pre>
        </div>
    </div>
</div>
