'use strict';

class Header extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return ( 
		
			<div className="full-scale border-bottom-1px">
            {/* header menü */}
				<div className="col-12">
					<ul>
						<li id="hauptstadtbiene"><a className="a-logo" href="./index.html">Hauptstadtbiene</a></li>
						<li><a className="a-menu" href="./sortiment.html">Honigsortiment</a></li>
						<li><a className="a-menu" href="./kontakt.html">Kontakt</a></li>
						<li><a className="a-menu" href="./anfahrt.html">Anfahrt</a></li>
						<li><a className="a-menu" href="./impressum.html">Impressum</a></li>
					</ul>
				</div>
            {/* full scale end, next */}
			</div>
			
        );
    }
}

let domContainer = document.querySelector('#header');
