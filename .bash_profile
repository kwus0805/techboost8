if [ -f ~/.bashrc ] ; then
. ~/.bashrc
fi

PATH="/usr/local/bin:/usr/bin:/bin:/usr/sbin:/sbin:/usr/local/bin:$PATH"

export PATH="/usr/local/sbin:$PATH"


# MySQL
export LDFLAGS="-L/usr/local/opt/mysql@5.7/lib"
export CPPFLAGS="-I/usr/local/opt/mysql@5.7/include"
export PATH="/usr/local/opt/mysql@5.7/bin:$PATH"
