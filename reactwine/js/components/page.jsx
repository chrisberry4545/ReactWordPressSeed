// Page

var Page = React.createClass({

    componentDidMount: function() {
        console.log('pages...');
        console.log(this.props.page)
    },

    render: function() {
        return (
            <div className="c-page">
                <h2>{this.props.page.title.rendered}</h2>
                <div>
                    {this.props.page.plaintext}
                </div>
            </div>
        );
    }
});
