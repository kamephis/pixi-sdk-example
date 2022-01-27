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

code.highlight {
    padding:2px 4px;
    font-size:90%;
    color:#c7254e;
    background-color:#f9f2f4;
    border-radius:4px
}
</style>
<div class="col-sm12">
    <h3>Example: pixiGetShops</h3>
    <p>In this example we are calling the API call <code class="highlight">pixiGetShops</code>, to receive a list of all configurated shops of the customer that is currently logged in.</p>
    <p>The by default inizialized object <code class="highlight">pixiapi</code> allows us to use every available API call on the customer database, by simply providing the name of the desired request.</p>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="highlight">
            <pre>
                <code>
&lt;?php

<span class="db">class</span> <span class="g">MyController</span> <span class="db">extends</span> <span class="g">SDKMenu</span>
{
    <span class="db">public function</span> <span class="g">__construct</span>()
    {
        <span class="g">parent</span>::<span class="lb">__construct</span>();
    }
    
    <span class="db">public function</span> <span class="g">index</span>()
    {
        <span class="lb">$request</span> = <span class="lb">$this</span>-><span class="lb">pixiapi</span>-><span class="lb">pixiGetShops</span>();
        <span class="lb">$result</span> = <span class="lb">$request</span>-><span class="lb">getResultset()</span>;
        
        <span class="g">print_r</span>(<span class="lb">$result</span>);
    }
}
                </code>
            </pre>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="highlight">
            <pre>
            
Array
(          
    [0] => Array
        (
            [ShopID] => HWV
            [ShopName] => Hardwareversand
            [Address] => Große Fleischergasse 11
            [City] => Leipzig
            [ZIP] => 04109
            [Country] => D  
            [Contact] => Carsten Pietsch
            [Phone] => +49(0)341 39 29 79 70
            [Fax] => +49(0)341 39 29 79 12
            [eMail] => hardwareversand@pixi.eu
        )
)  
            </pre>
        </div>
    </div>
</div>

<hr />

<div class="col-sm12">
    <h3>Example: Parameterized API call</h3>
    <p>This example will show you how to provide parameters to your request you're about to send. The only thing needed is an <code class="highlight">associative array</code> with the parameters accepted by the API call.</p>
    <p><strong>Be aware that the order of the parameters does matter!</strong></p>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="highlight">
            <pre>
                <code>
&lt;?php

<span class="db">class</span> <span class="g">MyController</span> <span class="db">extends</span> <span class="g">SDKMenu</span>
{
    <span class="db">public function</span> <span class="g">__construct</span>()
    {
        <span class="g">parent</span>::<span class="lb">__construct</span>();
    }
    
    <span class="db">public function</span> <span class="g">index</span>()
    {
        <span class="lb">$request</span> = <span class="lb">$this</span>-><span class="lb">pixiapi</span>-><span class="lb">pixiGetShops</span>(
            <span class="db">array</span>(
                <span class="r">'ShopID'</span> => <span class="r">'HWV'</span>,
                <span class="r">'ShopName'</span> => <span class="r">'Hardwareversand'</span>
            )
        );
        <span class="lb">$result</span> = <span class="lb">$request</span>-><span class="lb">getResultset()</span>;
        
        <span class="g">print_r</span>(<span class="lb">$result</span>);
    }
}
                </code>
            </pre>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="highlight">
            <pre>
            
Array
(          
    [0] => Array
        (
            [ShopID] => HWV
            [ShopName] => Hardwareversand
            [Address] => Große Fleischergasse 11
            [City] => Leipzig
            [ZIP] => 04109
            [Country] => D  
            [Contact] => Carsten Pietsch
            [Phone] => +49(0)341 39 29 79 70
            [Fax] => +49(0)341 39 29 79 12
            [eMail] => hardwareversand@pixi.eu
        )
)  
            </pre>
        </div>
    </div>
</div>

<hr />

<div class="col-sm12">
    <h3>Scan the sources</h3>
    <p>The source code of the API library used in the pixi* SDK is located on Bitbucket an public.<br />
    <a href="https://bitbucket.org/pixi_software/pixi-sdk-soap/overview" target="_blank">(Check it our for more details <i class="ace-icon fa fa-external-link"></i>)</a></p>
</div>
<!-- PAGE CONTENT ENDS -->
