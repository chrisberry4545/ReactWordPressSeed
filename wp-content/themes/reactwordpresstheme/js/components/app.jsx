// App

var App = React.createClass({

    getInitialState: function() {
        return {
            pages: []
        }
    },

    componentDidMount: function() {
        function getPages(callback) {
            jQuery.get('/wordpress/wp-json/wp/v2/pages', function(result) {
                callback(result);
            });
        }
        var self = this;
        getPages(function(result) {
            self.setState({
                pages: result
            });
        });
    },

    render: function() {
        return (
            <div className="c-app">
                {this.state.pages.map(function(page, i){
                    return <Page key={page.id} page={page} />;
                })}

                { !this.state.pages || !this.state.pages.length ? <Loader /> : null }
            </div>
        );
    }
});

ReactDOM.render(
    <App />,
    document.getElementById('content')
);
