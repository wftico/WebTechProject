'use strict';

class Footer extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return ( 
		
			<div className="full-scale">
				<div className="col-12" id="footer-top-border">
					<ul>
						<li>Kontakt</li>
						<li>Anfahrt</li>
						<li>Impressum</li>
					</ul>
				</div>
				<div className="col-12">
					<p className="font-size-14">Hobby-Imkerei L&uuml;ck - im Norden von Berlin</p>
				</div>
				<div className="col-12">
					<p className="font-size-14">Webdesign by Martin Nowatschek</p>
				</div>
				<div className="col-12" id="copyright-background">
					<p className="font-size-14">Copyright by Hauptstadtbiene 2019</p>
				</div>
			</div>
			
        );
    }
}

let domContainer = document.querySelector('#footer');
ReactDOM.render(<Footer/>, domContainer);