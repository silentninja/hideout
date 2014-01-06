{
    int x,y;
    int r;
    node(int a,int b,int c)
    {
        x=a;y=b;r=c;
    }
};
void next_move(int posy, int posx, vector <string> board) {
  queue<node> ar;
  node a (posx,posy,-1);
  ar.push(a);
  int xx,yy,p=0,lla;
  while(!ar.empty())
  {
      
    node r=ar.front();
   // cout<<r.x<<'\t'<<r.y<<'\t'<<lla<<endl;
    ar.pop();
    if(board[r.x][r.y]=='d'){
        lla=r.r;
        
        break;
    }
    
    if(p==0)
    {
        node ar1(r.x,r.y+1,1);
        node ar2(r.x,r.y-1,2);
        node ar3(r.x+1,r.y,3);
        node ar4(r.x-1,r.y,4);
        if(r.y!=board[0].length()-1)
        ar.push(ar1);
        if(r.y!=0)
        ar.push(ar2);
        if(r.x!=board.size()-1)
        ar.push(ar3);
        if(r.x!=0)
        ar.push(ar4);
        p=1;
    }
    else
    {
        node ar1(r.x,r.y+1,r.r);
        node ar2(r.x,r.y-1,r.r);
        node ar3(r.x+1,r.y,r.r);
        node ar4(r.x-1,r.y,r.r);
        if(r.y!=board[0].length()-1)
        ar.push(ar1);
        if(r.y!=0)
        ar.push(ar2);
        if(r.x!=board.size()-1)
        ar.push(ar3);
        if(r.x!=0)
        ar.push(ar4);    }
  }//cout<<"Here1"<<endl;
  
  if(lla==-1)
    {
        cout<<"CLEAN"<<endl;
        return;
    }
  if(lla==1)
    {
        cout<<"RIGHT"<<endl;
        return;
    }
  if(lla==2)
    {
        cout<<"LEFT"<<endl;
        return;
    }
  if(lla==3)
    {
        cout<<"DOWN"<<endl;
        return;
    }
  if(lla==4)
    {
        cout<<"UP"<<endl;
        return;
    }
 
}