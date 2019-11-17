
    function start(objectList)
    {
        initializeState('AM', ['AmR.png', 'AmG.png'], objectList[0]);
    }

    function initializeState(id, elements, JSONobjectsList) {
        let state = JSONobjectsList.currentState;

        if (state == 0)
        {
            document.getElementById(id).src = '../images/' + elements[0];
        }
        else if (state == 1)
        {
            document.getElementById(id).src = '../images/' + elements[1];
        }

    }

    function changeState(id, elements, JSONobjectsList)
    {
        let state = JSONobjectsList.currentState;

        if (state == 1)
        {
            document.getElementById(id).src = '../images/' + elements[0];
            state=0;

        }
        else if (state == 0)
        {
            document.getElementById(id).src = '../images/' + elements[1];
            state=1;
        }

        window.location.replace('/home/' + JSONobjectsList.id)
    }


